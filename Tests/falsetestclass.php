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

		for ($i = 0; $i < 10; $i++) {
			$test = true;
			$test = false;
		}

		for ($i = 0; $i < 10; $i++) 
			$test = true;

		if (true) {
			$test = true;
			$test = true;
		} else {
			$test = true;
		}

		foreach (array(true) as $var) {
			return true;
		}

		while (false) {
			return true;
		}

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

