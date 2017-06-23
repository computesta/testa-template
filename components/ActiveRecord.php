<?php
namespace app\components;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord as BaseActiveRecord;
use yii\db\Expression;
use app\models\User;

/**
 * Kelas active record dasar untuk semua active record yang ada
 * Semua model harus ada field publish, created_at, created_by, updated_at, updated_by
 */
class ActiveRecord extends BaseActiveRecord
{
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

}