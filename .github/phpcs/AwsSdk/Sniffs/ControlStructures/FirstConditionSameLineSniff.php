<?php

namespace AwsSdk\Sniffs\ControlStructures;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;
use PHP_CodeSniffer\Util\Tokens;

/**
 * Requires multi-line if conditions to begin on the same line as "if (".
 */
final class FirstConditionSameLineSniff implements Sniff
{
    public function register()
    {
        return [T_IF];
    }

    public function process(File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();
        if (!isset($tokens[$stackPtr]['parenthesis_opener'], $tokens[$stackPtr]['parenthesis_closer'])) {
            return;
        }

        $opener = $tokens[$stackPtr]['parenthesis_opener'];
        $closer = $tokens[$stackPtr]['parenthesis_closer'];
        if ($tokens[$opener]['line'] === $tokens[$closer]['line']) {
            return;
        }

        $first = $phpcsFile->findNext(T_WHITESPACE, $opener + 1, $closer, true);
        if ($first === false || $tokens[$first]['line'] === $tokens[$opener]['line']) {
            return;
        }

        $message = 'The first condition of a multi-line if statement must start on the same line as the opening parenthesis';
        if (isset(Tokens::$commentTokens[$tokens[$first]['code']])) {
            $phpcsFile->addError($message, $first, 'FirstConditionLine');
            return;
        }

        $fix = $phpcsFile->addFixableError($message, $first, 'FirstConditionLine');
        if ($fix === false) {
            return;
        }

        $phpcsFile->fixer->beginChangeset();
        for ($i = $opener + 1; $i < $first; $i++) {
            $phpcsFile->fixer->replaceToken($i, '');
        }
        $phpcsFile->fixer->endChangeset();
    }
}
