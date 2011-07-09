<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property string $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $cell
 * @property string $seed
 * @property string $flower
 * @property string $created
 * @property string $updated
 * @property integer $enrollment
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return User the static model class
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
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, email, cell, created, updated, enrollment', 'required'),
			array('enrollment', 'numerical', 'integerOnly'=>true),
			array('username, cell', 'length', 'max'=>32),
			array('password, email', 'length', 'max'=>255),
			array('seed, flower', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, password, email, cell, seed, flower, created, updated, enrollment', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array( 'registers' => array(self::HAS_MANY, 'Register', 'userId'),
				'suspends' => array(self::HAS_MANY, 'Suspend', 'userId'),
				'majors' => array(self::MANY_MANY, 'Major', 'user_major(userId, majorId)'),
				'bookComments' => array(self::HAS_MANY, 'BookComment', 'userId'),
				'speciesComments' => array(self::HAS_MANY, 'SpeciesComment', 'userId'),
				'orders' => array(self::HAS_MANY, 'Order', 'userId'),
				'mailings' => array(self::HAS_MANY, 'Mailing', 'userId')
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
			'email' => 'Email',
			'cell' => 'Cell',
			'seed' => 'Seed',
			'flower' => 'Flower',
			'created' => 'Created',
			'updated' => 'Updated',
			'enrollment' => 'Enrollment',
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
		$criteria->compare('email',$this->email,true);
		$criteria->compare('cell',$this->cell,true);
		$criteria->compare('seed',$this->seed,true);
		$criteria->compare('flower',$this->flower,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);
		$criteria->compare('enrollment',$this->enrollment);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}