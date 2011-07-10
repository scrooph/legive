<?php

/**
 * This is the model class for table "species".
 *
 * The followings are the available columns in table 'species':
 * @property string $id
 * @property string $name
 * @property string $series
 * @property integer $page
 * @property string $author
 * @property string $original
 * @property string $translator
 * @property string $pressId
 * @property integer $price
 * @property string $seed
 * @property string $description
 * @property string $created
 * @property string $updated
 * @property string $image
 */
class Species extends DatedActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Species the static model class
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
		return 'species';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('number, name, author', 'required'),
			array('page, price', 'numerical', 'integerOnly'=>true),
			array('number', 'length', 'max'=>32),
			array('name, series, author, original, translator, image', 'length', 'max'=>255),
			array('pressId', 'length', 'max'=>11),
			array('seed', 'length', 'max'=>10),
			array('description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, number, name, series, page, author, original, translator, pressId, price, seed, description, created, updated, image', 'safe', 'on'=>'search'),
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
				'numbers' => array(self::HAS_MANY, 'SpeciesNumber', 'speciesId'),
				'books' => array(self::HAS_MANY, 'Book', 'speciesId'),
				'speciesComments' => array(self::HAS_MANY, 'SpeciesComment', 'speciesId'),
				'courses' => array(self::MANY_MANY, 'Course', 'course_species(speciesId, courseId)')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'number' => 'Number',
			'name' => 'Name',
			'series' => 'Series',
			'page' => 'Page',
			'author' => 'Author',
			'original' => 'Original',
			'translator' => 'Translator',
			'pressId' => 'Press',
			'price' => 'Price',
			'seed' => 'Seed',
			'description' => 'Description',
			'created' => 'Created',
			'updated' => 'Updated',
			'image' => 'Image',
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
		$criteria->compare('number',$this->number,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('series',$this->series,true);
		$criteria->compare('page',$this->page);
		$criteria->compare('author',$this->author,true);
		$criteria->compare('original',$this->original,true);
		$criteria->compare('translator',$this->translator,true);
		$criteria->compare('pressId',$this->pressId,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('seed',$this->seed,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);
		$criteria->compare('image',$this->image,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}