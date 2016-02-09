<?php

class JsonCompiler
{
    use PhpFileLinterTrait;

    private static $tokensToReplace = [
        '(' => '__OPEN_PARENTHESIS__',
        ')' => '__CLOSE_PARENTHESIS__',
    ];

    /** @var string */
    private $path;

    public function __construct($path)
    {
        if (!file_exists($path)) {
            throw new InvalidArgumentException("No JSON file found at $path");
        }

        $this->path = realpath($path);
    }

    public function compile($outputPath)
    {
        $backup = $this->readPhpFile($outputPath);

        $this->writeFile($outputPath, $this->getTranspiledPhp());
        if (!$this->lintFile($outputPath)) {
            $this->writeFile($outputPath, $backup);
            trigger_error(
                "Unable to compile {$this->path} to valid PHP",
                E_USER_WARNING
            );
        }
    }

    private function getTranspiledPhp()
    {
        // Use var_export as a starting point.
        $code = var_export($this->getDecodedData(), true);

        // Convert "array()" to "[]".
        $code = str_replace('array (', '[', $code);
        $code = str_replace(')', ']', $code);

        // Removing trailing whitespace.
        $code = preg_replace('/\s+$/m', '', $code);

        // Move arrays to the same line.
        $code = preg_replace('/=>\s*\n\s*\[/', '=> [', $code);

        // Get rid of numbered array indexes.
        $code = preg_replace('/(\s*)(\d+ => )/', '$1', $code);

        // Make empty arrays span only a single line.
        $code = preg_replace('/=>\s*\[\n\s*\]/', '=> []', $code);

        // Minify the PHP file
        $code = preg_replace('/\s+/', ' ', str_replace("\n", '', $code));

        $originalPath = preg_replace('/^.+?(?=\/src\/data\/)/', '', $this->path);

        return <<<EOPHP
<?php
// This file was auto-generated from sdk-root$originalPath
return $code;

EOPHP;
    }

    private function getDecodedData()
    {
        return json_decode(
            strtr(file_get_contents($this->path), self::$tokensToReplace),
            true
        );
    }

    private function readPhpFile($path)
    {
        return file_exists($path) ?
            file_get_contents($path)
            : '<?php return [];';
    }

    private function writeFile($path, $contents)
    {
        return file_put_contents(
            $path,
            strtr($contents, array_flip(self::$tokensToReplace)),
            LOCK_EX
        );
    }
}
