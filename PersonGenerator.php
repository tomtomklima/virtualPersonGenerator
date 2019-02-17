<?php

namespace VirtualPersonGenerator;

include "Person.php";

class PersonGenerator {

	public function getPerson(): Person {
		return new Person();
	}

}