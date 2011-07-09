<?php

/**
 * This is the model class for table "suspend".
 *
 * The followings are the available columns in table 'suspend':
 * @property string $id
 * @property string $userId
 * @property string $administratorId
 * @property string $expiration
 * @property string $created
 * @property string $description
 * @property string $updated
 */
class Suspend extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Suspend the static model class
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
		return 'suspend';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('userId, administratorId, created, updated', 'required'),
			array('userId, administratorId', 'length', 'max'=>11),
			array('expiration, description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, userId, administratorId, expiration, created, description, updated', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array('user' => array(self::BELONGS_TO, 'User', 'userId')
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
			'administratorId' => 'Administrator',
			'expiration' => 'Expiration',
			'created' => 'Created',
			'description' => 'Description',
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
		$criteria->compare('administratorId',$this->administratorId,true);
		$criteria->compare('expiration',$this->expiration,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}