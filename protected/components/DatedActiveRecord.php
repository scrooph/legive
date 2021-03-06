<?php

class DatedActiveRecord extends CActiveRecord
{
	protected function beforeSave(){
		if($this->isNewRecord){
			$this->created = new CDbExpression('NOW()');
			$this->updated = new CDbExpression('NOW()');
		}else {
			$this->updated = new CDbExpression('NOW()');
		}
		
		return parent::beforeSave();
	}
}
