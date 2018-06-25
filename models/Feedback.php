<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "feedback".
 *
 * @property int $id
 * @property int $activity_id
 * @property int $performance
 * @property string $recommendations
 * @property string $aspect
 * @property string $feedback
 * @property int $status
 * @property string $created_at
 * @property int $created_by
 * @property string $updated_at
 * @property int $updated_by
 */
class Feedback extends \app\components\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'feedback';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['activity_id', 'performance', 'recommendations', 'aspect', 'feedback', 'status', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'required'],
            [['activity_id', 'performance', 'status', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['recommendations', 'aspect', 'feedback'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'activity_id' => 'Activity ID',
            'performance' => 'Performance',
            'recommendations' => 'Recommendations',
            'aspect' => 'Aspect',
            'feedback' => 'Feedback',
            'status' => 'Status',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }
}
