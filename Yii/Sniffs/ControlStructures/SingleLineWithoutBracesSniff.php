<?php

/**
 * Yii_Sniffs_ControlStructures_SingleLineWithoutBracesSniff.
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Artem Demchenkov <ardemchenkov@gmail.com>
 * @copyright 2013 Artem Demchenkov
 * @license   http://www.yiiframework.com/license/ BSD license
 * @link      http://pear.php.net/package/PHP_CodeSniffer
 */

/**
 * Yii_Sniffs_ControlStructures_SingleLineWithoutBracesSniff.
 *
 * Ensures that a single line "if" have an expression on next line without braces.
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Artem Demchenkov <ardemchenkov@gmail.com>
 * @copyright 2013 Artem Demchenkov
 * @license   http://www.yiiframework.com/license/ BSD license
 * @link      http://pear.php.net/package/PHP_CodeSniffer
 */
class Yii_Sniffs_ControlStructures_SingleLineWithoutBracesSniff implements PHP_CodeSniffer_Sniff {
	
	/**
	 * Registers the token types that this sniff wishes to listen to.
	 *
	 * @return array
	 */
	public function register() {
		return array(
			T_IF,
			T_WHILE,
			T_FOR,
			T_FOREACH,
			T_ELSE,
		);
	} //end register()

	/**
	 * Process the tokens that this sniff is listening for.
	 *
	 * @param PHP_CodeSniffer_File $phpcsFile The file where the token was found.
	 * @param int                  $stackPtr  The position in the stack where
	 *                                        the token was found.
	 *
	 * @return void
	 */
	public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr) {

		$allowedTokens = array(
			T_OPEN_CURLY_BRACKET
		);

		$next = $phpcsFile->findNext($allowedTokens, ($stackPtr + 1), null, false, null, true);
		
		if ($next === false) { // this is single line structure.
			
			$tokens = $phpcsFile->getTokens();

			// check the whitespace after tocken
			if ($tokens[$stackPtr + 1]['type'] != 'T_WHITESPACE' || strlen($tokens[$stackPtr + 1]['content']) > 1) {
				$error = 'Single line condition must have a one whitespace before opening parenthesis';
				$phpcsFile->addError($error, $stackPtr, 'SingleLineIfMustHaveAWhiteSpace');
			}
			
			// find the last close parenthesis in the condition.
			$i = 0;
			$newParenthesis = $stackPtr;
			do {
				$newParenthesis = $phpcsFile->findNext(array(T_OPEN_PARENTHESIS, T_CLOSE_PARENTHESIS), ($newParenthesis + 1));
				$i = ($tokens[$newParenthesis]['type'] == "T_OPEN_PARENTHESIS") ? $i + 1 : $i - 1;		
			} while ($i != 0);

			$closeBracket = $newParenthesis;
		
			// check the new line
			$n       = 1;
			$newline = false;
			
			while ($tokens[$closeBracket + $n]['type'] == 'T_WHITESPACE') {
				$strlen = strlen($tokens[$closeBracket + $n]['content']);
				if ($tokens[$closeBracket + $n]['content'][$strlen - 1] == $phpcsFile->eolChar) {
					$newline = true;
					break;
				}
				$n++;
			}
			
			if ($newline === false) {
				$error = 'Single line "%s" must have an expression started from new line. ';
				$phpcsFile->addError($error, $stackPtr, 'SingleLineExpressionMustHaveANewLineExpression', array(strtoupper($tokens[$stackPtr]['content'])));
			}
		}
	} //end process()
} //end class