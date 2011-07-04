<?php

/**
 * This is the model class for table "inventory_administrator".
 *
 * The followings are the available columns in table 'inventory_administrator':
 * @property string $id
 * @property string $inventoryId
 * @property string $administratorId
 * @property string $assignerId
 * @property string $expiration
 * @property string $installment
 * @property string $created
 * @property string $updated
 */
class InventoryAdministrator extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return InventoryAdministrator the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'inventory_administrator';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('inventoryId, administratorId, created, updated', 'required'),
			array('inventoryId, administratorId, assignerId', 'length', 'max'=>11),
			array('expiration, installment', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, inventoryId, administratorId, assignerId, expiration, installment, created, updated', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'inventoryId' => 'Inventory',
			'administratorId' => 'Administrator',
			'assignerId' => 'Assigner',
			'expiration' => 'Expiration',
			'installment' => 'Installment',
			'created' => 'Created',
			'updated' => 'Updated',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('inventoryId',$this->inventoryId,true);
		$criteria->compare('administratorId',$this->administratorId,true);
		$criteria->compare('assignerId',$this->assignerId,true);
		$criteria->compare('expiration',$this->expiration,true);
		$criteria->compare('installment',$this->installment,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}