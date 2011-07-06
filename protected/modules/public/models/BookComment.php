<?php

/**
 * This is the model class for table "book_comment".
 *
 * The followings are the available columns in table 'book_comment':
 * @property string $id
 * @property string $bookId
 * @property string $userId
 * @property string $content
 * @property string $created
 * @property string $updated
 */
class BookComment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return BookComment the static model class
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
		return 'book_comment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('bookId, userId, content, created, updated', 'required'),
			array('bookId, userId', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, bookId, userId, content, created, updated', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array( 'book' => array(self::BELONGS_TO, 'Book', 'bookId'),
				'user' => array(self::BELONGS_TO, 'User', 'userId')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'bookId' => 'Book',
			'userId' => 'User',
			'content' => 'Content',
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
		$criteria->compare('bookId',$this->bookId,true);
		$criteria->compare('userId',$this->userId,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}