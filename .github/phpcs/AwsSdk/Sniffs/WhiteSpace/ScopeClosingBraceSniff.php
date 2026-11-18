<?php

namespace AwsSdk\Sniffs\WhiteSpace;

use AwsSdk\Sniffs\Classes\ClassDeclarationSniff;
use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Standards\Squiz\Sniffs\WhiteSpace\ScopeClosingBraceSniff as SquizScopeClosingBraceSniff;

/**
 * Squiz closing brace checks that skip a class, interface, trait or enum
 * whose body is `{}` at the end of the declaration.
 */
final class ScopeClosingBraceSniff extends SquizScopeClosingBraceSniff
{
    public function process(File $phpcsFile, $stackPtr): void
    {
        $code = $phpcsFile->getTokens()[$stackPtr]['code'];
        if (in_array($code, [T_CLASS, T_INTERFACE, T_TRAIT, T_ENUM], true)
            && ClassDeclarationSniff::hasEmptyOneLineBody($phpcsFile, $stackPtr)
        ) {
            return;
        }

        parent::process($phpcsFile, $stackPtr);
    }
}
