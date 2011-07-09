<?php

/**
 * This is the model class for table "college".
 *
 * The followings are the available columns in table 'college':
 * @property string $id
 * @property string $image
 * @property string $name
 * @property string $address
 * @property string $contact
 * @property string $created
 * @property string $updated
 */
class College extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return College the static model class
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
		return 'college';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, created, updated', 'required'),
			array('image, name, address, contact', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, image, name, address, contact, created, updated', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array( 'departments' => array(self::HAS_MANY, 'Department', 'collegeId'),
				'inventories' => array(self::MANY_MANY, 'Inventory', 'inventory_college(collegeId, inventoryId)'),
				'courses' => array(self::HAS_MANY, 'Course', 'collegeId')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'image' => 'Image',
			'name' => 'Name',
			'address' => 'Address',
			'contact' => 'Contact',
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
		$criteria->compare('image',$this->image,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('contact',$this->contact,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}