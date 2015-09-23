<?php

/**
 * Adds and removes annotations to a class.
 *
 * @internal
 */
class ClassAnnotationUpdater
{
    use PhpFileLinterTrait;

    /** @var ReflectionClass */
    private $reflection;
    /** @var string[] */
    private $linesToAppend;
    /** @var string */
    private $defaultDocBlock;
    /** @var string */
    private $removeMatching;

    public function __construct(
        ReflectionClass $reflection,
        array $linesToAppend,
        $defaultDocBlock,
        $removeMatching = ''
    ) {
        $this->reflection = $reflection;
        $this->linesToAppend = $linesToAppend;
        $this->defaultDocBlock = $defaultDocBlock;
        $this->removeMatching = $removeMatching;
    }

    /**
     * Performs update on class file and lints the output. If the output fails
     * linting, the change is reverted.
     *
     * @return bool TRUE on success, FALSE on failure
     */
    public function update()
    {
        // copy the code into memory
        $backup = file($this->reflection->getFileName());

        list($preamble, $class) = $this->splitClassFile($backup);
        $preamble = $this->stripOutExistingDocBlock($preamble);
        $preamble .= $this->buildUpdatedDocBlock();

        if ($this->writeClassFile(implode(PHP_EOL, [$preamble, $class]))
            && $this->commandLineLint($this->reflection->getFileName())
        ) {
            return true;
        }

        $this->writeClassFile(implode('', $backup));
        return false;
    }

    private function splitClassFile(array $lines)
    {
        $classLineOffset = $this->reflection->getStartLine() - 1;
        return [
            implode('', array_slice($lines, 0, $classLineOffset)),
            implode('', array_slice($lines, $classLineOffset)),
        ];
    }

    private function stripOutExistingDocBlock($preamble)
    {
        if ($this->reflection->getDocComment()) {
            return str_replace(
                $this->reflection->getDocComment() . PHP_EOL,
                '',
                $preamble
            );
        }

        return $preamble;
    }

    private function buildUpdatedDocBlock()
    {
        $docBlockLines = explode(
            PHP_EOL,
            $this->reflection->getDocComment() ?: $this->defaultDocBlock
        );

        // remove lines matching exclusion patterns
        if ($this->removeMatching) {
            $docBlockLines = array_filter($docBlockLines, function ($line) {
                return !preg_match($this->removeMatching, trim($line));
            });
        }

        // hold on to the closing line
        $lastLine = array_pop($docBlockLines);

        // add a padding line if needed
        if (' *' !== end($docBlockLines)) {
            $docLines []= ' *';
        }

        // append API @method annotations
        $docBlockLines = array_merge($docBlockLines, $this->linesToAppend);

        // add back the closing line
        $docBlockLines []= $lastLine;

        // send everything back as a string
        return implode(PHP_EOL, $docBlockLines);
    }

    private function writeClassFile($contents)
    {
        return (bool) file_put_contents(
            $this->reflection->getFileName(),
            $contents,
            LOCK_EX
        );
    }
}
