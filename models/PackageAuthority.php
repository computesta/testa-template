<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "package_authority".
 *
 * @property int $id
 * @property int $package_id
 * @property int $authority_id
 * @property int $level_max
 */
class PackageAuthority extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'package_authority';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['package_id', 'authority_id', 'level_max'], 'required'],
            [['package_id', 'authority_id', 'level_max'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'package_id' => 'Package ID',
            'authority_id' => 'Authority ID',
            'level_max' => 'Level Max',
        ];
    }
}
