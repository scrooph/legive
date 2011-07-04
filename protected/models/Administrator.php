<?php

/**
 * This is the model class for table "administrator".
 *
 * The followings are the available columns in table 'administrator':
 * @property string $id
 * @property string $username
 * @property string $password
 * @property string $created
 * @property string $creatorId
 * @property string $email
 * @property string $cell
 * @property string $updated
 */
class Administrator extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Administrator the static model class
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
		return 'administrator';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, created, email, updated', 'required'),
			array('username, cell', 'length', 'max'=>32),
			array('password, email', 'length', 'max'=>255),
			array('creatorId', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, password, created, creatorId, email, cell, updated', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array('creator' => array(self::BELONGS_TO, 'Administrator', 'creatorId'),
				'roles' => array(self::MANY_MANY, 'Role', 'administrator_role(administratorId, roleId)'),
				'creations' => array(self::HAS_MANY, 'Administrator', 'creatorId'),
				'orders' => array(self::HAS_MANY, 'Order', 'administratorId'),
				'inventories' => array(self::MANY_MANY, 'Inventory', 'inventory_administrator(administratorId, inventoryId)')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
			'created' => 'Created',
			'creatorId' => 'Creator',
			'email' => 'Email',
			'cell' => 'Cell',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('creatorId',$this->creatorId,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('cell',$this->cell,true);
		$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}