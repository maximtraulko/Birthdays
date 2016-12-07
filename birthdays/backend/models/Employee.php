<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $patronymic
 * @property string $date_of_birth
 * @property integer $status
 * @property integer $department_id
 * @property string $mobile_number
 * @property string $email
 * @property string $hobby
 *
 * @property Depatment $department
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'patronymic', 'date_of_birth', 'department_id', 'mobile_number', 'email', 'hobby', 'status'], 'required', 'message' => 'Поле обязательное для заполнения'],
			[
			['email'], 'email', 'message'=> 'Введен неверный адрес email'
			
			
			],
 			 
            [['date_of_birth'], 'safe'],
            [['status', 'department_id'], 'integer'],
            [['hobby'], 'string'],
            [['first_name', 'last_name', 'patronymic', 'mobile_number', 'email'], 'string', 'max' => 100, 'tooLong' => 'Указано слишком длинное значение'],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => Depatment::className(), 'targetAttribute' => ['department_id' => 'department_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID сотрудника',
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'patronymic' => 'Отчество',
            'date_of_birth' => 'Дата рождения',
            'status' => 'В настоящее время работает',
            'department_id' => 'ID отдела',
            'mobile_number' => 'Номер телефона',
            'email' => 'Электронная почта',
            'hobby' => 'Интересы и увлечения',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Depatment::className(), ['department_id' => 'department_id']);
    }
}
