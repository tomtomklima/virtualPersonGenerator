<?php

namespace VirtualPersonGenerator;

class Person {
	public $photoLink;
	public $name;
	public $age;
	public $country;
	public $email;

	public function __construct() {
		// set all randomly
		$this->photoLink = 'https://thispersondoesnotexist.com/?nocache='.rand(0, 99999);
		// use UInames.com for random infos
		$fakeData = json_decode(file_get_contents('https://uinames.com/api/?ext'));

		$this->name = $fakeData->name.' '.$fakeData->surname;
		$this->age = rand(rand(7, 17), rand(59, 89));
		$this->country = $fakeData->region;
		$this->email = $this->getEmail($fakeData->name, $fakeData->surname);
	}

	private function getEmail($firstName, $lastName) {
		$prefix = [
			$firstName.'.'.rand(0, 199),
			$lastName.'.'.rand(0, 99),
			$firstName.'.'.$lastName,
			mb_strtolower($firstName).$lastName,
		];

		$emailProviders = [
			'yahoo.com',
			'gmail.com',
			'email.com',
			'yandex.com',
		];

		return $prefix[array_rand($prefix)].'@'.$emailProviders[array_rand($emailProviders)];
	}
}