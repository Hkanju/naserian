<?php

/**
 * This is the model class for table "active_record_log".
 *
 * The followings are the available columns in table 'active_record_log':
 * @property string $id
 * @property string $description
 * @property string $action
 * @property string $table
 * @property string $table_id
 * @property string $creationdate
 * @property string $username
 * @property string $old_values
 * @property string $new_values
 * @author Mohamed Manja <mohamedmanja@gmail.com>
 */
class ActiveRecordLog extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ActiveRecordLog the static model class
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
		return 'active_record_log';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('creationdate', 'required'),
			array('description', 'length', 'max'=>255),
			array('action, table_id', 'length', 'max'=>20),
			array('table, username', 'length', 'max'=>45),
			array('old_values, new_values', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, description, action, table,table_id, creationdate, username, old_values, new_values', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'description' => 'Description',
			'action' => 'Action',
			'table' => 'Table',
			'table_id'=>'Table Id',
			'creationdate' => 'Creationdate',
			'username' => 'Username',
			'old_values' => 'Old Values',
			'new_values' => 'New Values',
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

		$criteria->compare('id',$this->id,false);

		$criteria->compare('description',$this->description,true);

		$criteria->compare('action',$this->action,true);

		$criteria->compare('table',$this->table,true);

		$criteria->compare('table_id',$this->table_id,true);

		$criteria->compare('creationdate',$this->creationdate,true);

		$criteria->compare('username',$this->username,true);

		$criteria->compare('old_values',$this->old_values,true);

		$criteria->compare('new_values',$this->new_values,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}