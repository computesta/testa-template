<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ppds_detail".
 *
 * @property int $user_id
 * @property int $study_program_id
 * @property int $package_id paket: 10 magang 20 madya 30 mandiri
 * @property int $student_number nim
 * @property string $name
 * @property int $semester
 */
class PpdsDetail extends \app\components\ActiveRecord
{
	public $study_program;
    /**
     * {@inheritdoc}
     */
	
    public static function tableName()
    {
        return 'ppds_detail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'study_program_id', 'package_id', 'student_number', 'name', 'semester'], 'required'],
            [['user_id', 'study_program_id', 'package_id', 'student_number', 'semester'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['user_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'study_program_id' => 'Study Program ID',
            'package_id' => 'Package ID',
            'student_number' => 'Student Number',
            'name' => 'Name',
            'semester' => 'Semester',
        ];
    }
}
