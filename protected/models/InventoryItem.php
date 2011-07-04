<?php

/**
 * This is the model class for table "inventory_item".
 *
 * The followings are the available columns in table 'inventory_item':
 * @property string $id
 * @property string $in
 * @property string $out
 * @property string $bookId
 * @property string $inventoryId
 * @property string $created
 * @property string $updated
 */
class InventoryItem extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return InventoryItem the static model class
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
		return 'inventory_item';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('bookId, inventoryId, created, updated', 'required'),
			array('bookId, inventoryId', 'length', 'max'=>11),
			array('in, out', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, in, out, bookId, inventoryId, created, updated', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array( 'inventory' => array(self::BELONGS_TO, 'Inventory', 'inventoryId'),
				'book' => array(self::BELONGS_TO, 'Book', 'bookId')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'in' => 'In',
			'out' => 'Out',
			'bookId' => 'Book',
			'inventoryId' => 'Inventory',
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
		$criteria->compare('in',$this->in,true);
		$criteria->compare('out',$this->out,true);
		$criteria->compare('bookId',$this->bookId,true);
		$criteria->compare('inventoryId',$this->inventoryId,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}