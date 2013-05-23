 <?php

class testClassController
{

	const test_CONSTANT = true;

	public $Test_Property = true;

	public function Test_Method() {
		if(true) return false;

		return true;
        }

	private function _Private_Method() {
		if (true)
		{
	
		}
		else if(false){

		}
	}
}

class SecondClass {

}

$new = new testClassController;

