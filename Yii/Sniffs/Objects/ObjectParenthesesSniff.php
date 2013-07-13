<?php

/**
 * Yii_Sniffs_Objects_ObjectParenthesesSniff.
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
 * Yii_Sniffs_Objects_ObjectParenthesesSniff.
 *
 * Ensures that new object declaration have an open and close parentheses.
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Artem Demchenkov <ardemchenkov@gmail.com>
 * @copyright 2013 Artem Demchenkov
 * @license   http://www.yiiframework.com/license/ BSD license
 * @link      http://pear.php.net/package/PHP_CodeSniffer
 */
class Yii_Sniffs_Objects_ObjectParenthesesSniff implements PHP_CodeSniffer_Sniff {

	/**
	 * Registers the token types that this sniff wishes to listen to.
	 *
	 * @return array
	 */
	public function register() {
		return array(T_NEW);
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
			T_OPEN_PARENTHESIS,
			T_CLOSE_PARENTHESIS,
		);

		$next = $phpcsFile->findNext($allowedTokens, ($stackPtr + 1));
		
		if ($next === false) {
			$error = 'New object declaration must contain a couple parentheses: new MyClass()';
			$phpcsFile->addError($error, $stackPtr, 'ObjectParenthesisNotFound');
		}
	} //end process()
} //end class