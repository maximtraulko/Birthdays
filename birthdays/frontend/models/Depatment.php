<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "depatment".
 *
 * @property integer $department_id
 * @property string $name
 *
 * @property Employee[] $employees
 */
class Depatment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'depatment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'department_id' => 'ID отдела',
            'name' => 'Наименование отдела',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployees()
    {
        return $this->hasMany(Employee::className(), ['department_id' => 'department_id']);
    }
}
