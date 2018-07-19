<?php

class snapChallenge {
	private $name;
	private $age;



	public function __construct(string $newName, $newAge) {
		try{
			$this->setName($newName);
			$this->setAge($newAge);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw (new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}

	public function getName() : string {
		return ($this->name);
	}

	public function setName(string $newName) {
		$newName = trim($newName);
		$newName = filter_var($newName, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);

		if(empty($newName) === true) {
			throw new \InvalidArgumentException("content is empty or insecure");
		}
		$this->name = $newName;
	}

	public function getAge() : int {
		return ($this->age);
	}

	public function setAge(int $newAge) {
		if($newAge < 0 ) {
			throw new \RangeException("content is empty or insecure");
		}
	$this->age = $newAge;
	}
}

$snapChallenge = new snapChallenge("Ryan", 27);
$snapChallenge->setAge(28);
var_dump($snapChallenge->getAge());