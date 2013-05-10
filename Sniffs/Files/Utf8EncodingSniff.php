<?php
/**
 * Yii_Sniffs_Files_Utf8EncodingSniff.
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
 * Yii_Sniffs_Files_Utf8EncodingSniff.
 *
 * Ensures that this file have UTF-8 encoding.
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Artem Demchenkov <ardemchenkov@gmail.com>
 * @copyright 2013 Artem Demchenkov
 * @license   http://www.yiiframework.com/license/ BSD license
 * @link      http://pear.php.net/package/PHP_CodeSniffer
 */
class Yii_Sniffs_Files_Utf8EncodingSniff implements PHP_CodeSniffer_Sniff
{

	/**
	 * A list of tokenizers this sniff supports.
	 *
	 * @var array	
	 */
	public $supportedTokenizers = array(
					'PHP',
	);

	/**
	 * Returns the token types that this sniff is interested in.
	 *
	 * @return array(int)
	 */
	public function register()
	{
		return array(T_OPEN_TAG);
	}//end register()

	/**
	 * Processes this test, when one of its tokens is encountered.
	 *
	 * @param PHP_CodeSniffer_File $phpcsFile The file being scanned.
	 * @param int                  $stackPtr  The position of the current token
	 *                                        in the stack passed in $tokens.
	 *
	 * @return void
	 */
	public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
	{
		// chech the first open tag.
		if ($stackPtr !== 0) {
			if ($phpcsFile->findPrevious(T_OPEN_TAG, ($stackPtr - 1)) !== false)
				return;
		}

		$filePath    = $phpcsFile->getFilename();
		$fileContent = file_get_contents($filePath);
		$encoding    = mb_detect_encoding($fileContent);

		if ($encoding !== 'UTF-8') {
			$fileName = basename($filePath);
			
			if ($encoding) {
				$error = 'File must use only UTF-8 encoding. but %s found';
				$phpcsFile->addError($error, $stackPtr, 'FileIsNotUTF8Encoded', array($encoding));
			} else {
				$error = 'File must use only UTF-8 encoding.';
                                $phpcsFile->addError($error, 0);
			}
		}
	}//end process()

}//end class

?>
