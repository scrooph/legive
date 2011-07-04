<?php

/**
 * This is the model class for table "role".
 *
 * The followings are the available columns in table 'role':
 * @property string $id
 * @property integer $doAdministrator
 * @property integer $doInventory
 * @property integer $doUser
 * @property integer $doOrder
 * @property string $created
 * @property string $updated
 */
class Role extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Role the static model class
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
		return 'role';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('doAdministrator, doInventory, doUser, doOrder, created, updated', 'required'),
			array('doAdministrator, doInventory, doUser, doOrder', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, doAdministrator, doInventory, doUser, doOrder, created, updated', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array( 'administrators' => array(self::MANY_MANY, 'Administrator', 'administrator_role(roleId, administratorId)')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'doAdministrator' => 'Do Administrator',
			'doInventory' => 'Do Inventory',
			'doUser' => 'Do User',
			'doOrder' => 'Do Order',
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
		$criteria->compare('doAdministrator',$this->doAdministrator);
		$criteria->compare('doInventory',$this->doInventory);
		$criteria->compare('doUser',$this->doUser);
		$criteria->compare('doOrder',$this->doOrder);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}