<?php

namespace AwsSdk\Sniffs\Classes;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Standards\PSR2\Sniffs\Classes\ClassDeclarationSniff as PSR2ClassDeclarationSniff;

/**
 * PSR-2 class declaration checks that also allow an empty body written as
 * `{}` at the end of the declaration, such as
 * `class FooException extends AwsException {}`.
 */
final class ClassDeclarationSniff extends PSR2ClassDeclarationSniff
{
    public function process(File $phpcsFile, $stackPtr): void
    {
        if (!self::hasEmptyOneLineBody($phpcsFile, $stackPtr)) {
            parent::process($phpcsFile, $stackPtr);
            return;
        }

        // Keep the keyword and extends/implements checks, skip the brace checks.
        $this->processOpen($phpcsFile, $stackPtr);
    }

    /**
     * Returns true when the declaration's body is `{}` on one line.
     */
    public static function hasEmptyOneLineBody(File $phpcsFile, int $stackPtr): bool
    {
        $tokens = $phpcsFile->getTokens();
        if (!isset($tokens[$stackPtr]['scope_opener'], $tokens[$stackPtr]['scope_closer'])) {
            return false;
        }
        $opener = $tokens[$stackPtr]['scope_opener'];

        return $tokens[$stackPtr]['scope_closer'] === $opener + 1
            && $tokens[$opener]['line'] === $tokens[$stackPtr]['line'];
    }
}
