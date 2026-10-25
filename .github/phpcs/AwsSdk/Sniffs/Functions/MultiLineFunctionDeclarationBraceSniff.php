<?php

namespace AwsSdk\Sniffs\Functions;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;
use PHP_CodeSniffer\Util\Tokens;

/**
 * Applies the SDK brace style to multi-line function declarations.
 *
 * Named declarations with return types place the brace on its own line.
 * Other declarations place the brace on the declaration's final line.
 */
final class MultiLineFunctionDeclarationBraceSniff implements Sniff
{
    public function register(): array
    {
        return [T_FUNCTION, T_CLOSURE];
    }

    public function process(File $phpcsFile, mixed $stackPtr): void
    {
        $tokens = $phpcsFile->getTokens();
        if (!isset($tokens[$stackPtr]['parenthesis_opener'])
            || !isset($tokens[$stackPtr]['parenthesis_closer'])
            || !isset($tokens[$stackPtr]['scope_opener'])
        ) {
            return;
        }

        $opener = $tokens[$stackPtr]['parenthesis_opener'];
        $closer = $tokens[$stackPtr]['parenthesis_closer'];
        $brace = $tokens[$stackPtr]['scope_opener'];
        $declarationEnd = $phpcsFile->findPrevious(
            Tokens::$emptyTokens,
            $brace - 1,
            $closer,
            true
        );
        if ($declarationEnd === false
            || $tokens[$stackPtr]['line'] === $tokens[$declarationEnd]['line']
        ) {
            return;
        }

        $returnType = $phpcsFile->findNext(
            T_COLON,
            $closer + 1,
            $brace
        );
        $hasReturnType = $returnType !== false;
        $braceOnOwnLine = $tokens[$stackPtr]['code'] === T_FUNCTION
            && $hasReturnType;

        $braceIsOnOwnLine = $tokens[$declarationEnd]['line']
            !== $tokens[$brace]['line'];
        if ($braceOnOwnLine === $braceIsOnOwnLine) {
            return;
        }

        if ($braceOnOwnLine) {
            $message = 'The opening brace of a multi-line typed function declaration must be on its own line';
            $code = 'TypedBraceOwnLine';
        } else {
            $message = 'The opening brace of this multi-line function declaration must follow the declaration';
            $code = 'BraceSameLine';
        }

        $comments = $phpcsFile->findNext(
            Tokens::$commentTokens,
            $closer + 1,
            $brace
        );
        if ($comments !== false) {
            $phpcsFile->addError($message, $brace, $code);
            return;
        }

        $fixable = $phpcsFile->addFixableError(
            $message,
            $brace,
            $code
        );
        if (!$fixable) {
            return;
        }

        $phpcsFile->fixer->beginChangeset();
        for ($i = $declarationEnd + 1; $i < $brace; $i++) {
            $phpcsFile->fixer->replaceToken($i, '');
        }
        if ($braceOnOwnLine) {
            $declarationStart = $phpcsFile->findFirstOnLine(
                [T_PUBLIC, T_PROTECTED, T_PRIVATE, T_STATIC, T_FUNCTION],
                $stackPtr
            );
            $indent = str_repeat(
                ' ',
                $tokens[$declarationStart]['column'] - 1
            );
            $phpcsFile->fixer->addContentBefore(
                $brace,
                $phpcsFile->eolChar . $indent
            );
        } else {
            $phpcsFile->fixer->addContentBefore($brace, ' ');
        }
        $phpcsFile->fixer->endChangeset();
    }
}
