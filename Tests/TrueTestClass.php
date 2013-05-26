<?php

class TrueTestClass
{

	const TEST_CONSTANT = true;

	public $testProperty = true;

	public function testMethod()
	{
		if (true)
			return true;
		else
			return false;
		
		while (true)
			return true;
		
		for (true;true;true)
			return true;
		
		foreach (array(true) as $var)
			return true;

		return true;
	}

	private function _privateMethod()
	{
		if (true) {

		} elseif (false) {

		}
	}
}

$new = new TrueTestClass();
