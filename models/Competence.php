<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "competence".
 *
 * @property int $id
 * @property int $study_program_id
 * @property string $name
 * @property string $created_at
 * @property int $created_by
 * @property string $updated_at
 * @property int $updated_by
 */
class Competence extends \app\components\ActiveRecord
{
	public $studyProgramName,$study_program;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'competence';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['study_program_id', 'name'], 'required'],
            [['study_program_id', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'created_by', 'updated_at', 'updated_by','studyProgramName'], 'safe'],
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
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }
}
