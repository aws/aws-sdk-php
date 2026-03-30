<?php

namespace AwsBuild\Command;

final class NormalizeDocsFilesCommand extends AbstractCommand
{
    public function getName(): string
    {
        return 'normalize-docs-files';
    }

    public function getDescription(): string
    {
        return 'Normalizes phpDocumentor HTML output and copies static assets.';
    }

    public function getUsage(): string
    {
        return 'php build/WorkflowCommandRunner.php normalize-docs-files';
    }

    protected function doExecute(array $args): int
    {
        $buildDir = self::getBuildDir();
        $parentDirectory = $buildDir . '/artifacts/docs';
        $classesDirectory = "$parentDirectory/classes";
        $namespacesDirectory = "$parentDirectory/namespaces";
        $packagesDirectory = "$parentDirectory/packages";

        // Process classes and namespaces directories
        $this->normalizeAndMoveFiles($namespacesDirectory, "namespace-");
        $this->normalizeAndMoveFiles($classesDirectory, "class-");
        $this->normalizeAndMoveFiles($packagesDirectory, "package-");

        // Update hrefs in HTML files
        $this->updateHtmlHrefs($parentDirectory);

        // Updates search index urls with generated api pages
        $this->updateSearchIndex($parentDirectory . '/js/searchIndex.js');

        // Add the SNS validator notice
        $this->insertSnsValidatorNotice($parentDirectory);

        // Move static assets
        $this->copyDirectory($buildDir . '/docs/static', $parentDirectory . '/static');
        $this->copyDirectory($buildDir . '/docs/js', $parentDirectory . '/js');
        $this->copyDirectory($buildDir . '/docs/css', $parentDirectory . '/css');

        // Remove unnecessary files/directories
        $removableDirs = ['classes', 'files', 'graphs', 'indices', 'namespaces', 'packages', 'reports'];

        foreach ($removableDirs as $dir) {
            $this->deleteDirectory("{$parentDirectory}/{$dir}");
        }

        $this->output("All tasks completed.");
        return 0;
    }

    private function normalizeAndMoveFiles(string $directory, string $prefix): void
    {
        $files = glob($directory . '/*');
        foreach ($files as $file) {
            if (is_file($file)) {
                $basename = ucfirst(basename($file));
                $modifiedBasename = str_replace("-", ".", $basename);
                $newFilename = $prefix . $modifiedBasename;
                $newPath = dirname($directory) . '/' . $newFilename;
                rename($file, $newPath);
                $this->output("Moved and renamed $file to $newPath");
            }
        }
    }

    private function updateHtmlHrefs(string $directory): void
    {
        $htmlFiles = glob($directory . '/*.html');
        foreach ($htmlFiles as $file) {
            $doc = new \DOMDocument();
            @$doc->loadHTMLFile($file);

            // Remove <base> tags
            while (($baseTags = $doc->getElementsByTagName('base')) && $baseTags->length) {
                $baseTag = $baseTags->item(0);
                $baseTag->parentNode->removeChild($baseTag);
            }

            $links = $doc->getElementsByTagName('a');

            foreach ($links as $link) {
                if ($link->hasAttribute('href')) {
                    $href = $link->getAttribute('href');
                    $href = preg_replace_callback(
                        '/(namespaces|classes|packages)\/([a-zA-Z])/',
                        function ($matches) {
                            if ($matches[1] === 'classes') {
                                $prefix = 'class';
                            } else {
                                $prefix = substr($matches[1], 0, -1);
                            }

                            return $prefix . '-' . strtoupper($matches[2]);
                        },
                        $href
                    );
                    $href = preg_replace_callback(
                        '/(namespace-|class-|package-)([\w-]+)\.html/',
                        function ($matches) {
                            $suffix = str_replace("-", ".", $matches[2]);
                            return $matches[1] . $suffix . '.html';
                        },
                        $href
                    );
                    $link->setAttribute('href', $href);
                }
            }

            // Remove <aside> tags with class "phpdocumentor-element-found-in"
            $asides = $doc->getElementsByTagName('aside');
            $asidesToRemove = [];

            foreach ($asides as $aside) {
                if ($aside->getAttribute('class') === 'phpdocumentor-element-found-in') {
                    $asidesToRemove[] = $aside;
                }
            }

            foreach ($asidesToRemove as $asideToRemove) {
                $asideToRemove->parentNode->removeChild($asideToRemove);
            }

            $divs = $doc->getElementsByTagName('div');

            foreach ($divs as $div) {
                if ($div->getAttribute('class') === 'phpdocumentor-modal-content') {
                    $preTags = $div->getElementsByTagName('pre');

                    foreach ($preTags as $pre) {
                        if ($pre->hasAttribute('data-src') && strpos($pre->getAttribute('data-src'), 'files/') === 0) {
                            $div->parentNode->removeChild($div);
                            break;
                        }
                    }
                }
            }

            $doc->saveHTMLFile($file);
            $this->output("Updated hrefs in $file");
        }
    }

    private function updateSearchIndex(string $filePath): void
    {
        $content = file_get_contents($filePath);
        if ($content === false) {
            $this->output("Failed to read file: $filePath");
            return;
        }

        $pattern = '/("url":\s*")((?:classes|namespaces)\/)([^"]+)(")/';
        $replacement = function ($matches) {
            $newPrefix = str_replace(['classes/', 'namespaces/'], ['class-', 'namespace-'], $matches[2]);
            $remainder = ucfirst($matches[3]);
            $remainder = preg_replace('/-/', '.', $remainder);

            return $matches[1] . $newPrefix . $remainder . $matches[4];
        };

        $updatedContent = preg_replace_callback($pattern, $replacement, $content);

        $result = file_put_contents($filePath, $updatedContent);
        if ($result === false) {
            $this->output("Failed to write updated content to file: $filePath");
        } else {
            $this->output("File updated successfully: $filePath");
        }
    }

    private function insertSnsValidatorNotice(string $directory): void
    {
        $targetFile = $directory . '/class-Aws.Sns.MessageValidator.html';

        if (!file_exists($targetFile)) {
            $this->output("SNS MessageValidator class file not found");
            return;
        }

        $doc = new \DOMDocument();
        @$doc->loadHTMLFile($targetFile);

        $titleElement = null;
        $h2Elements = $doc->getElementsByTagName('h2');
        foreach ($h2Elements as $h2) {
            if ($h2->getAttribute('class') === 'phpdocumentor-content__title') {
                $titleElement = $h2;
                break;
            }
        }

        if (!$titleElement) {
            $this->output("Could not find title element in MessageValidator documentation");
            return;
        }

        $noticeDiv = $doc->createElement('div');
        $noticeDiv->setAttribute('class', 'phpdocumentor-admonition');

        $headerParagraph = $doc->createElement('p');
        $icon = $doc->createElement('i');
        $icon->setAttribute('class', 'fas fa-question-circle phpdocumentor-admonition__icon');
        $headerParagraph->appendChild($icon);

        $contentParagraph = $doc->createElement('p');
        $textBefore = $doc->createTextNode('This class is maintained in ');
        $link = $doc->createElement('a', 'aws-php-sns-message-validator');
        $link->setAttribute('href', 'https://github.com/aws/aws-php-sns-message-validator');

        $contentParagraph->appendChild($textBefore);
        $contentParagraph->appendChild($link);

        $noticeDiv->appendChild($headerParagraph);
        $noticeDiv->appendChild($contentParagraph);

        $titleElement->parentNode->insertBefore($noticeDiv, $titleElement->nextSibling);

        $doc->saveHTMLFile($targetFile);
        $this->output("Added SNS validator notice to MessageValidator documentation");
    }

    private function copyDirectory(string $src, string $dst): void
    {
        if (!file_exists($dst)) {
            mkdir($dst, 0777, true);
        }

        $dir = opendir($src);
        while (false !== ($file = readdir($dir))) {
            if ($file != '.' && $file != '..') {
                if (is_dir($src . '/' . $file)) {
                    $this->copyDirectory($src . '/' . $file, $dst . '/' . $file);
                } else {
                    copy($src . '/' . $file, $dst . '/' . $file);
                }
            }
        }

        closedir($dir);
    }

    private function deleteDirectory(string $dir): bool
    {
        if (!is_dir($dir)) {
            return false;
        }

        $handle = opendir($dir);

        while (false !== ($file = readdir($handle))) {
            if ($file != '.' && $file != '..') {
                $path = $dir . '/' . $file;
                if (is_dir($path)) {
                    $this->deleteDirectory($path);
                } else {
                    unlink($path);
                }
            }
        }
        closedir($handle);

        return rmdir($dir);
    }
}
