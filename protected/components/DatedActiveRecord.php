<?php

class DatedActiveRecord extends CActiveRecord
{
	protected void beforeSave(){
		if(parent::beforeSave()){
			$this->updated = date('Y-m-d H:i:s');
			$this->save();
		}
	}
	
	protected void afterConstructed(){
		if(parent::afterConstructed()){
			$this->created = date('Y-m-d H:i:s');
		}
	}
}
