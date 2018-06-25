<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "authority".
 *
 * @property int $id
 * @property int $study_program_id
 * @property string $name
 * @property int $semester_start
 * @property int $semester_end
 * @property string $created_at
 * @property int $created_by
 * @property string $updated_at
 * @property int $updated_by
 */
class Authority extends \app\components\ActiveRecord
{
	public $studyProgramName,$study_program;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'authority';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['study_program_id', 'name', 'semester_start', 'semester_end'], 'required'],
            [['study_program_id', 'semester_start', 'semester_end', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at', 'updated_at', 'updated_by','studyProgramName'], 'safe'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'study_program_id' => 'Study Program ID',
            'name' => 'Name',
            'semester_start' => 'Semester Start',
            'semester_end' => 'Semester End',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }
}
