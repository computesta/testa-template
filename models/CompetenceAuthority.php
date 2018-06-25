<?php

namespace app\models;

use app\components\ActiveRecord;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "competence_authority".
 *
 * @property int $competence_id
 * @property int $authority_id
 */
class CompetenceAuthority extends ActiveRecord
{
	public $competenceName,$authorityName;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'competence_authority';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['competence_id', 'authority_id'], 'required'],
            [['competence_id', 'authority_id'], 'integer'],
			[['competenceName', 'authorityName','created_at', 'updated_at', 'created_by', 'updated_by'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'competence_id' => 'Competence ID',
            'authority_id' => 'Authority ID',
        ];
    }
	
	public function getCompetence(){
		return $this->hasOne(Competence::className(), ['id' => 'competence_id']);
	}
	
	public function getAuthority(){
		return $this->hasOne(Authority::className(), ['id' => 'authority_id']);
	}
	
    public static function getDataListCompetence()
    {
        $dataModel = Competence::find()->all();
        
        $dataList = [];
        
        if(count($dataModel) > 0)
        {
            $dataList += ArrayHelper::map($dataModel, 'id', function($dataModel){
                return $dataModel->name;//.' | '.$dataModel->customer->name.' | '.$dataModel->getDecimalFormatted('grand_total');
            });
        }
        
        return $dataList;
    }
	
    public static function getDataListAuthority()
    {
        $dataModel = Authority::find()->all();
        
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
