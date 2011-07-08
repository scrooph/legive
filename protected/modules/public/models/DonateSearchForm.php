<?php

class DonateSearchForm extends CFormModel{
	public $name;

	public function rules(){
		return array(
			array('name', 'required'),
		);
	}

	public function search(){
		$species = Species::Model()->findAllByAttributes(array('name'=>$this->name));
		return $species;
	}
}