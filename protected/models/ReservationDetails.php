<?php

/**
 * This is the model class for table "reservation_details".
 *
 * The followings are the available columns in table 'reservation_details':
 * @property integer $id
 * @property string $check_in
 * @property string $check_out
 * @property string $room_tyepe
 * @property integer $adults
 * @property integer $children
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $other_info
 */
class ReservationDetails extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'reservation_details';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name,email,phone', 'required'),
			array('id, adults', 'numerical', 'integerOnly'=>true),
			array('room_tyepe, phone, other_info', 'length', 'max'=>45),
			array('name, email', 'length', 'max'=>100),
			array('check_in, check_out', 'safe'),
			array('email' ,'email' ),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, check_in, check_out, room_tyepe, adults, children, name, email, phone, other_info', 'safe', 'on'=>'search'),
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
			'check_in' => 'Check In',
			'check_out' => 'Check Out',
			'room_tyepe' => 'Room Tyepe',
			'adults' => 'Adults',
			'children' => 'Children',
			'name' => 'Name',
			'email' => 'Email',
			'phone' => 'Phone',
			'other_info' => 'Other Info',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('check_in',$this->check_in,true);
		$criteria->compare('check_out',$this->check_out,true);
		$criteria->compare('room_tyepe',$this->room_tyepe,true);
		$criteria->compare('adults',$this->adults);
		$criteria->compare('children',$this->children);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('other_info',$this->other_info,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ReservationDetails the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

		public function behaviors()
	{
	    return array(
	    'datetimeI18NBehavior' => array('class' => 'application.extensions.DateTimeI18NBehavior'),
	    'CAdvancedArBehavior' => array('class' => 'application.extensions.CAdvancedArBehavior'),
        'ActiveRecordLogableBehavior'=>'application.behaviors.ActiveRecordLogableBehavior',
	    'DecimalI18NBehavior'=>'application.behaviors.DecimalI18NBehavior',
	    );
	}
}
