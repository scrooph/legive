<?php

Class DonateSpeciesFormModel extends CFormModel{
	public $name;
	public $author;
	public $series;
	public $page;
	public $original;
	public $translator;
	public $press;
	public $price;
	public $descrition;
	public $count;
//	public $image;

	public function rules(){
		return array(
			array('name, page, author, price', 'required', 'enableClientValidation'=>true),
			array('page', 'numerical', 'min'=>0, 'integerOnly'=>true, 'enableClientValidation'=>true, 'message'=>'请输入合适的页数。'),
			array('price', 'numerical', 'min'=>0, 'integerOnly'=>true, 'message'=>'请输入合适的整数定价。'),
			array('count', 'required'),
			array('count', 'default', 'value'=>1),
		);
	}
	
	public function attributeLabels(){
		return array(
			'name'=>'书籍名',
			);
	}
}
