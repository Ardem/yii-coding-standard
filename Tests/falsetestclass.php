 <?php

class testClassController
{

	const test_CONSTANT = true;

	public $Test_Property = true;

	public function Test_Method() {
		if  (true) return true;
		else return false;
		while(true) return true;
		for(true;true;true) return true;
		foreach(array(true) as $var) return true;

		return true;
        }

	public function _Private_Method() {
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

