<?php

/**
 * This is the model class for table "department".
 *
 * The followings are the available columns in table 'department':
 * @property string $id
 * @property string $collegeId
 * @property string $name
 * @property string $expiration
 * @property string $created
 * @property string $updated
 */
class Department extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Department the static model class
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
		return 'department';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('collegeId, name, created, updated', 'required'),
			array('collegeId', 'length', 'max'=>11),
			array('name', 'length', 'max'=>255),
			array('expiration', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, collegeId, name, expiration, created, updated', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array( 'courses' => array(self::HAS_MANY, 'Course', 'departmentId'),
				'college' => array(self::BELONGS_TO, 'College', 'collegeId'),
				'majors' => array(self::HAS_MANY, 'Major', 'departmentId')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'collegeId' => 'College',
			'name' => 'Name',
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
		$criteria->compare('collegeId',$this->collegeId,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('expiration',$this->expiration,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}