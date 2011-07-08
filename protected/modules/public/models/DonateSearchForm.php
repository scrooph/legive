<?php

class DonateSearchForm extends CFormModel{
	public $name;

	public function rules(){
		return array(
			array('name', 'required'),
		);
	}

	public function search(){
		$species = new Species;
		$species->findAllByAttributes(array('name'=>$name));
		return $species;
	}
}