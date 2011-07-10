<?php

/**
 * This is the model class for table "order".
 *
 * The followings are the available columns in table 'order':
 * @property string $id
 * @property string $userId
 * @property string $call
 * @property string $administratorId
 * @property string $type
 * @property string $status
 * @property string $message
 * @property string $review
 * @property string $created
 * @property string $updated
 */
class Order extends DatedActiveRecord
{
	const STATUS_SAVED = 'saved';
	const TYPE_DONATE = 'donate';
	
	/**
	 * Returns the static model of the specified AR class.
	 * @return Order the static model class
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
		return 'order';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('userId, type, status', 'required'),
			array('userId, administratorId', 'length', 'max'=>11),
			array('type, status', 'length', 'max'=>32),
			array('message, review', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, userId, call, administratorId, type, status, message, review, created, updated', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array( 'user' => array(self::BELONGS_TO, 'User', 'userId'),
				'orderItems' => array(self::HAS_MANY, 'OrderItem', 'orderId'),
				'administrator' => array(self::BELONGS_TO, 'Administrator', 'administratorId')
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
			'call' => 'Call',
			'administratorId' => 'Administrator',
			'type' => 'Type',
			'status' => 'Status',
			'message' => 'Message',
			'review' => 'Review',
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
		$criteria->compare('call',$this->call,true);
		$criteria->compare('administratorId',$this->administratorId,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('review',$this->review,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function scopes(){
		return array(
			'saved' => array(
				'condition'=>'status=:status',
				'params'=>array(':status'=>self::STATUS_SAVED),
				),
			);
	}
	
	public function createDefaultOrder(){
		$order = new Order;
		$order->status = Order::STATUS_SAVED;
		$order->type = Order::TYPE_DONATE;
		return $order;
	}			
}