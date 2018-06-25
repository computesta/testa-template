<?php
namespace app\components;

use app\models\StudyProgram;
use app\models\User;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord as BaseActiveRecord;
use yii\db\Expression;
use yii\helpers\ArrayHelper;

class ActiveRecord extends BaseActiveRecord
{
//	public static $study_program_id;
	/**
	 * add condition default find
	 * 
	 * @return ActiveQuery
	 */
	public static function find()
	{
//		var_dump(property_exists(get_called_class(), 'study_program_id'));die;
//		if(property_exists(get_called_class(), 'study_program_id')) {
//			var_dump(parent::find());die;
//		}
		if(property_exists(get_called_class(), 'study_program')) {
			return parent::find()
			->onCondition([ 'and' ,
				['=' , static::tableName() . '.study_program_id', \Yii::$app->user->identity->study_program_id],
			]);
		}else{
			return parent::find();
		}
	}

	public function behaviors()
	{
		return [
			'timestamp' => [
				'class' => TimestampBehavior::className(),
				'attributes' => [
					ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
					ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
				],
				'value' => new Expression('NOW()'),
			],
			'blameable' => [
				'class' => BlameableBehavior::className(),
				'createdByAttribute' => 'created_by',
				'updatedByAttribute' => 'updated_by',
			],
		];
	}

	/**
	* @return ActiveQuery
	*/
	public function getCreatedBy()
	{
		return $this->hasOne(User::className(), ['id' => 'created_by']);
	}

	/**
	* @return ActiveQuery
	*/
	public function getUpdatedBy()
	{
		return $this->hasOne(User::className(), ['id' => 'updated_by']);
	}
	
	/**
	 * @return ActiveQuery
	 */
	public function getStudyProgram(){
		return $this->hasOne(StudyProgram::className(),['id' => 'study_program_id']);
	}
	
	/**
	 * list semua program study
	 * @return type
	 */
	
    public static function getDataListStudyProgram()
    {
        $dataModel = StudyProgram::find()->all();
        
        $dataList = [];
        
        if(count($dataModel) > 0)
        {
            $dataList += ArrayHelper::map($dataModel, 'id', function($dataModel){
                return $dataModel->name;//.' | '.$dataModel->customer->name.' | '.$dataModel->getDecimalFormatted('grand_total');
            });
        }
        
        return $dataList;
    }
}
