<?php

/**
 * This is the model class for table "mailing".
 *
 * The followings are the available columns in table 'mailing':
 * @property string $id
 * @property string $userId
 * @property string $name
 * @property string $address
 * @property string $contact
 * @property string $cell
 * @property string $post
 * @property string $created
 * @property string $updated
 */
class Mailing extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Mailing the static model class
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
		return 'mailing';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('userId, address, created, updated', 'required'),
			array('userId, post', 'length', 'max'=>10),
			array('name, contact, cell', 'length', 'max'=>32),
			array('address', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, userId, name, address, contact, cell, post, created, updated', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array( 'user' => array(self:BELONGS_TO, 'User', 'userId')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'userId' => 'User',
			'name' => 'Name',
			'address' => 'Address',
			'contact' => 'Contact',
			'cell' => 'Cell',
			'post' => 'Post',
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
		$criteria->compare('userId',$this->userId,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('contact',$this->contact,true);
		$criteria->compare('cell',$this->cell,true);
		$criteria->compare('post',$this->post,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}