<?php

class DatedActiveRecord extends CActiveRecord
{
	public function beforeSave(){
		if($this->isNewRecord){
			$this->created = new CDbExpression('NOW()');
		}else {
			$this->updated = new CDbExpression('NOW()');
		}
		
		return parent::beforeSave();
	}
}
