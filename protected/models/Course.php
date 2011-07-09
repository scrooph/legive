<?php

/**
 * This is the model class for table "course".
 *
 * The followings are the available columns in table 'course':
 * @property string $id
 * @property string $created
 * @property string $updated
 * @property string $majorId
 * @property string $departmentId
 * @property string $collegeId
 * @property string $type
 * @property string $semester
 * @property string $name
 * @property string $description
 */
class Course extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Course the static model class
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
		return 'course';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('created, updated, type, name', 'required'),
			array('majorId, departmentId, collegeId', 'length', 'max'=>11),
			array('type, semester', 'length', 'max'=>32),
			array('name', 'length', 'max'=>255),
			array('description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, created, updated, majorId, departmentId, collegeId, type, semester, name, description', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array( 'college' => array(self::BELONGS_TO, 'College', 'collegeId'),
				'department' => array(self::BELONGS_TO, 'Department', 'departmentId'),
				'major' => array(self::BELONGS_TO, 'Major', 'majorId'),
				'species' => array(self::MANY_MANY, 'Species', 'course_species(courseId, speciesId)')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'created' => 'Created',
			'updated' => 'Updated',
			'majorId' => 'Major',
			'departmentId' => 'Department',
			'collegeId' => 'College',
			'type' => 'Type',
			'semester' => 'Semester',
			'name' => 'Name',
			'description' => 'Description',
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
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);
		$criteria->compare('majorId',$this->majorId,true);
		$criteria->compare('departmentId',$this->departmentId,true);
		$criteria->compare('collegeId',$this->collegeId,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('semester',$this->semester,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}