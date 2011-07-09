<?php

class DonateSearchFormModel extends CFormModel{
	public $name;

	public function rules(){
		return array(
			array('name', 'required'),
		);
	}
}
