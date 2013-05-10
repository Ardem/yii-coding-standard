<?php

class TrueTestClass
{

	const TEST_CONSTANT = true;

	public $testProperty = true;

	public function testMethod()
	{
		if(true)
			return false;

		return true;
	}

	private function _privateMethod()
	{
		if (true) {

		} elseif (false) {

		}
	}
}
