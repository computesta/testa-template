<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "activity".
 *
 * @property int $id
 * @property int $location_id
 * @property int $supervisor_id
 * @property int $authority_id
 * @property string $authority_phase
 * @property string $date
 * @property string $case
 * @property string $description
 * @property string $difficulty
 * @property string $learn
 * @property string $plan
 * @property string $picture
 * @property int $status
 * @property string $created_at
 * @property int $created_by
 * @property string $updated_at
 * @property int $updated_by
 */
class Activity extends \app\components\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'activity';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['location_id', 'supervisor_id', 'authority_id', 'authority_phase', 'date', 'case', 'description', 'difficulty', 'learn', 'plan', 'status', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'required'],
            [['location_id', 'supervisor_id', 'authority_id', 'status', 'created_by', 'updated_by'], 'integer'],
            [['authority_phase', 'date', 'created_at', 'updated_at'], 'safe'],
            [['case', 'description', 'difficulty', 'learn', 'plan', 'picture'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'location_id' => 'Location ID',
            'supervisor_id' => 'Supervisor ID',
            'authority_id' => 'Authority ID',
            'authority_phase' => 'Authority Phase',
            'date' => 'Date',
            'case' => 'Case',
            'description' => 'Description',
            'difficulty' => 'Difficulty',
            'learn' => 'Learn',
            'plan' => 'Plan',
            'picture' => 'Picture',
            'status' => 'Status',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }
}
