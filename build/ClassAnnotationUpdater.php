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

        // Remove annotation lines matching the exclusion pattern. The
        // pattern matches the opening line of a generated annotation; when
        // that line opens a multi-line `@phpstan-method` block, we also
        // strip the continuation lines up to and including the block
        // terminator (the line ending with `$args = [])`). This keeps
        // regeneration idempotent even when previous runs produced
        // multi-line array shapes.
        if ($this->removeMatching) {
            $docBlockLines = $this->stripAnnotationBlocks($docBlockLines);
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

    /**
     * Block-aware filter: walks the docblock lines and drops any run that
     * begins with a line matching the exclusion pattern. When the opener
     * is a `@phpstan-method` line that starts a multi-line array-shape
     * block (open `(` without a matching `)` on the same line), we
     * continue dropping lines until we consume the terminator (the line
     * that closes the outer `(...)`).
     *
     * A line is considered a *complete* single-line annotation when its
     * open and close paren counts balance. This handles the legacy
     * form:
     *
     *   * @method \Aws\Result foo(array $args = [])
     *
     * as well as its version-tagged variant:
     *
     *   * @method \Aws\Result foo(array $args = []) (supported in versions X)
     *
     * both of which have balanced parens on a single line. Multi-line
     * `@phpstan-method` blocks look like:
     *
     *   * @phpstan-method \Aws\Result foo(array{
     *   *     Key?: string,
     *   *     ...,
     *   * } $args = [])
     *
     * where the opening line has an unbalanced `(` and the closing line
     * balances it. Using paren balance (rather than looking for a
     * specific `$args = [])` suffix) means the trailing "(supported in
     * versions ...)" tag doesn't get mistaken for a continuation opener.
     *
     * @param string[] $lines Docblock lines in original order
     * @return string[]
     */
    private function stripAnnotationBlocks(array $lines): array
    {
        $out = [];
        $depth = 0;

        foreach ($lines as $line) {
            $trimmed = trim($line);

            if ($depth > 0) {
                // We're inside a multi-line block: keep dropping lines
                // and tracking paren balance until we close the outer
                // `(`.
                $depth += substr_count($trimmed, '(') - substr_count($trimmed, ')');
                if ($depth <= 0) {
                    $depth = 0;
                }
                continue;
            }

            if (preg_match($this->removeMatching, $trimmed)) {
                $opens = substr_count($trimmed, '(');
                $closes = substr_count($trimmed, ')');
                if ($opens > $closes) {
                    // Opener of a multi-line block. Initialise depth to
                    // the net-open count from this line.
                    $depth = $opens - $closes;
                }
                // Either way, drop the opener line.
                continue;
            }

            $out[] = $line;
        }

        return $out;
    }
}



