<?php

// Function to normalize and move files
function normalizeAndMoveFiles($directory, $prefix) {
    $files = glob($directory . '/*');
    foreach ($files as $file) {
        if (is_file($file)) {
            // Extract the basename and apply transformations
            $basename = ucfirst(basename($file));

            // Replace all dashes in the basename with dots
            $modifiedBasename = str_replace("-", ".", $basename);

            // Construct the new filename by prepending the prefix (which includes the dash)
            $newFilename = $prefix . $modifiedBasename;

            // Move file to parent directory
            $newPath = dirname($directory) . '/' . $newFilename;
            rename($file, $newPath);
            echo "Moved and renamed $file to $newPath\n";
        }
    }
}

// Function to update hrefs in HTML files
function updateHtmlHrefs($directory) {
    $htmlFiles = glob($directory . '/*.html');
    foreach ($htmlFiles as $file) {
        $doc = new DOMDocument();
        @$doc->loadHTMLFile($file); // Suppress warnings for invalid HTML

        // Remove <base> tags
        while (($baseTags = $doc->getElementsByTagName('base')) && $baseTags->length) {
            $baseTag = $baseTags->item(0);
            $baseTag->parentNode->removeChild($baseTag);
        }

        $links = $doc->getElementsByTagName('a');

        foreach ($links as $link) {
            if ($link->hasAttribute('href')) {
                $href = $link->getAttribute('href');
                // Replace and capitalize as needed
                $href = preg_replace_callback(
                    '/(namespaces|classes|packages)\/([a-zA-Z])/',
                    function ($matches) {
                        // Capitalize the first letter after the prefix and replace / with -
                        if ($matches[1] === 'classes') {
                            $prefix = 'class'; // Directly set to 'class' for 'classes'
                        } else {
                            // For 'namespaces' and 'packages', simply remove the last character
                            $prefix = substr($matches[1], 0, -1);
                        }

                        return $prefix . '-' . strtoupper($matches[2]);
                    },
                    $href
                );
                // Replace dashes with dots after the specific prefixes
                $href = preg_replace_callback(
                    '/(namespace-|class-|package-)([\w-]+)\.html/',
                    function ($matches) {
                        // Replace all dashes in the suffix part with dots
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

        // Remove the selected <aside> tags
        foreach ($asidesToRemove as $asideToRemove) {
            $asideToRemove->parentNode->removeChild($asideToRemove);
        }

        $divs = $doc->getElementsByTagName('div');

        foreach ($divs as $div) {
            // Check if the div has the class 'phpdocumentor-modal-content'
            if ($div->getAttribute('class') === 'phpdocumentor-modal-content') {
                $preTags = $div->getElementsByTagName('pre');

                // Check each pre tag in the current div
                foreach ($preTags as $pre) {
                    if ($pre->hasAttribute('data-src') && strpos($pre->getAttribute('data-src'), 'files/') === 0) {
                        // If condition is met, remove the div from its parent
                        $div->parentNode->removeChild($div);
                        break; // Stop checking other pre tags if one meets the criteria
                    }
                }
            }
        }

        // Save the changes
        $doc->saveHTMLFile($file);
        echo "Updated hrefs in $file\n";
    }
}

function updateSearchIndex($filePath) {
    // Read the content of the file
    $content = file_get_contents($filePath);
    if ($content === false) {
        echo "Failed to read file: $filePath\n";
        return;
    }

    // Regular expression to find and replace the URLs
    $pattern = '/("url":\s*")((?:classes|namespaces)\/)([^"]+)(")/';
    $replacement = function ($matches) {
        // Replace 'classes/' with 'class-' and 'namespaces/' with 'namespace-'
        $newPrefix = str_replace(['classes/', 'namespaces/'], ['class-', 'namespace-'], $matches[2]);

        // Capitalize the first letter after the prefix and replace dashes with dots in the rest of the string
        $remainder = ucfirst($matches[3]);
        $remainder = preg_replace('/-/', '.', $remainder);

        return $matches[1] . $newPrefix . $remainder . $matches[4];
    };

    // Perform the replacement
    $updatedContent = preg_replace_callback($pattern, $replacement, $content);

    // Write the updated content back to the file
    $result = file_put_contents($filePath, $updatedContent);
    if ($result === false) {
        echo "Failed to write updated content to file: $filePath\n";
    } else {
        echo "File updated successfully: $filePath\n";
    }
}

function insertSnsValidatorNotice($directory)
{
    $targetFile = $directory . '/class-Aws.Sns.MessageValidator.html';

    if (!file_exists($targetFile)) {
        echo "SNS MessageValidator class file not found\n";
        return;
    }

    $doc = new DOMDocument();
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
        echo "Could not find title element in MessageValidator documentation\n";
        return;
    }

    $noticeDiv = $doc->createElement('div');
    $noticeDiv->setAttribute('class', 'phpdocumentor-admonition');

    // Create header paragraph with icon and Info text
    $headerParagraph = $doc->createElement('p');
    $icon = $doc->createElement('i');
    $icon->setAttribute('class', 'fas fa-question-circle phpdocumentor-admonition__icon');
    $headerParagraph->appendChild($icon);

    // Create the main content paragraph
    $contentParagraph = $doc->createElement('p');
    $textBefore = $doc->createTextNode('This class is maintained in ');
    $link = $doc->createElement('a', 'aws-php-sns-message-validator');
    $link->setAttribute('href', 'https://github.com/aws/aws-php-sns-message-validator');

    $contentParagraph->appendChild($textBefore);
    $contentParagraph->appendChild($link);

    // Append both paragraphs to the notice div
    $noticeDiv->appendChild($headerParagraph);
    $noticeDiv->appendChild($contentParagraph);

    $titleElement->parentNode->insertBefore($noticeDiv, $titleElement->nextSibling);

    $doc->saveHTMLFile($targetFile);
    echo "Added SNS validator notice to MessageValidator documentation\n";
}

function copyDirectory($src, $dst) {
    if (!file_exists($dst)) {
        mkdir($dst, 0777, true);
    }

    $dir = opendir($src);
    while (false !== ($file = readdir($dir))) {
        if ($file != '.' && $file != '..') {
            if (is_dir($src . '/' . $file)) {
                copyDirectory($src . '/' . $file, $dst . '/' . $file);
            } else {
                copy($src . '/' . $file, $dst . '/' . $file);
            }
        }
    }

    closedir($dir);
}

function deleteDirectory($dir) {
    if (!is_dir($dir)) {
        return false;
    }

    $handle = opendir($dir);

    while (false !== ($file = readdir($handle))) {
        if ($file != '.' && $file != '..') {
            $path = $dir . '/' . $file;
            if (is_dir($path)) {
                // Recursively delete subdirectories
                deleteDirectory($path);
            } else {
                // Delete files
                unlink($path);
            }
        }
    }
    closedir($handle);

    return rmdir($dir);
}

$parentDirectory = __DIR__ . '/artifacts/docs';
$classesDirectory = "$parentDirectory/classes";
$namespacesDirectory = "$parentDirectory/namespaces";
$packagesDirectory = "$parentDirectory/packages";

// Process classes and namespaces directories
normalizeAndMoveFiles($namespacesDirectory, "namespace-");
normalizeAndMoveFiles($classesDirectory, "class-");
normalizeAndMoveFiles($packagesDirectory, "package-");

// Update hrefs in HTML files
updateHtmlHrefs($parentDirectory);

// Updates search index urls with generated api pages
updateSearchIndex($parentDirectory . '/js/searchIndex.js');

// Add the SNS validator notice
insertSnsValidatorNotice($parentDirectory);

//move static assets
copyDirectory(__DIR__ . '/docs/static', $parentDirectory . '/static');
copyDirectory(__DIR__ . '/docs/js', $parentDirectory . '/js');
copyDirectory(__DIR__ . '/docs/css', $parentDirectory . '/css');

//remove unnecessary files/directories
$removableDirs = ['classes', 'files', 'graphs', 'indices', 'namespaces', 'packages', 'reports'];

foreach ($removableDirs as $dir) {
    deleteDirectory("{$parentDirectory}/{$dir}");
}

echo "All tasks completed.\n";
