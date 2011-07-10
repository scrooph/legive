<?php

class DatedActiveRecord extends CActiveRecord
{
	protected function beforeSave(){
		if($this->isNewRecord){
			$this->created = date('Y-m-s H:i:s');
			echo 'bbbbbbbbbbbbbbbbbbbbbbbbbb';
		}else {
			echo 'nnnnnnnnnnnnnnnnnnnnnnnnnn';
			$this->updated = new CDbExpression('NOW()');
		}
		
		return parent::beforeSave();
	}
}
