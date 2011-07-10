<?php

/**
 * This is the model class for table "book".
 *
 * The followings are the available columns in table 'book':
 * @property string $id
 * @property string $speciesId
 * @property string $damage
 * @property string $isbn
 * @property string $description
 * @property string $created
 * @property string $updated
 * @property string $image
 * @property string $status
 * @property string $seed
 */
class Book extends DatedActiveRecord
{
	public static const DAMAGE_DEFAULT = 'default';
	public static const STATUS_CREATED = 'created';
	/**
	 * Returns the static model of the specified AR class.
	 * @return Book the static model class
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
		return 'book';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('speciesId, isbn, created, updated, status', 'required'),
			array('speciesId, seed', 'length', 'max'=>11),
			array('damage, status', 'length', 'max'=>32),
			array('isbn, image', 'length', 'max'=>255),
			array('description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, speciesId, damage, isbn, description, created, updated, image, status, seed', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array( //'species' => array(self::BELONGS_TO, 'Species', 'speciesId'),
				'bookComments' => array(self::HAS_MANY, 'BookComment', 'bookId'),
				'inventoryItems' => array(self::HAS_MANY, 'InventoryItem', 'bookId'),
				'orderItems' => array(self::HAS_MANY, 'OrderItem', 'bookId')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'speciesId' => 'Species',
			'damage' => 'Damage',
			'isbn' => 'ISBN',
			'description' => 'Description',
			'created' => 'Created',
			'updated' => 'Updated',
			'image' => 'Image',
			'status' => 'Status',
			'seed' => 'Seed',
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
		$criteria->compare('speciesId',$this->speciesId,true);
		$criteria->compare('damage',$this->damage,true);
		$criteria->compare('isbn',$this->isbn,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('seed',$this->seed,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public static function createDefaultBook(){
		$book = new Book;
		$book->damage = Book::DAMAGE_DEFAULT;
		$book->status = Book::STATUS_CREATED;
		$book->seed = 1;
		return $book;
	}
}