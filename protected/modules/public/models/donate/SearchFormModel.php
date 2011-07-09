<?php

class SearchFormModel extends CFormModel{
	public $name;

	public function rules(){
		return array(
			array('name', 'required'),
		);
	}
}
