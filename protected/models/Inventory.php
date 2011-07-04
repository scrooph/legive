<?php

/**
 * This is the model class for table "inventory".
 *
 * The followings are the available columns in table 'inventory':
 * @property string $id
 * @property string $address
 * @property string $contact
 * @property string $setup
 * @property string $expiration
 * @property string $created
 * @property string $updated
 */
class Inventory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Inventory the static model class
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
		return 'inventory';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('created, updated', 'required'),
			array('address, contact', 'length', 'max'=>255),
			array('setup, expiration', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, address, contact, setup, expiration, created, updated', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array( 'colleges' => array(self::MANY_MANY, 'College', 'inventory_college(inventoryId, collegeId)'),
				'inventoryItems' => array(self::HAS_MANY, 'InventoryItem', 'inventoryId'),
				'administrators' => array(self::MANY_MANY, 'Administrator', 'inventory_administrator(inventoryId, administratorId)')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'address' => 'Address',
			'contact' => 'Contact',
			'setup' => 'Setup',
			'expiration' => 'Expiration',
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
		$criteria->compare('address',$this->address,true);
		$criteria->compare('contact',$this->contact,true);
		$criteria->compare('setup',$this->setup,true);
		$criteria->compare('expiration',$this->expiration,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}