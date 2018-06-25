<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "exclusion".
 *
 * @property int $id
 * @property int $user_id
 * @property int $authority_id
 * @property int $level_max
 */
class Exclusion extends \app\components\ActiveRecord
{
	public $userName, $authorityName;
    /**
     * {@inheritdoc}
     */
	
    public static function tableName()
    {
        return 'exclusion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'authority_id', 'level_max'], 'required'],
            [['user_id', 'authority_id', 'level_max'], 'integer'],
			[['authorityName', 'userName'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'authority_id' => 'Authority ID',
            'level_max' => 'Level Max',
        ];
    }
	
	public function getAuthority(){
		return $this->hasOne(Authority::className(), ['id' => 'authority_id']);
	}
	
	public function getUser(){
		return $this->hasOne(PpdsDetail::className(), ['user_id' => 'user_id']);
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
	
    public static function getDataListUser()
    {
        $dataModel = PpdsDetail::find()->all();
        
        $dataList = [];
        
        if(count($dataModel) > 0)
        {
            $dataList += ArrayHelper::map($dataModel, 'user_id', function($dataModel){
                return $dataModel->name;//.' | '.$dataModel->customer->name.' | '.$dataModel->getDecimalFormatted('grand_total');
            });
        }
        
        return $dataList;
    }
}
