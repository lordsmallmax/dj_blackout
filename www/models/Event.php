<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "event".
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string|null $date
 * @property string|null $location
 * @property int|null $is_active
 * @property string|null $created_at
 */
class Event extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'event';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'slug'], 'required'],
            [['date', 'created_at'], 'safe'],
            [['is_active'], 'boolean'],
            [['name', 'slug', 'location'], 'string', 'max' => 255],
            [['slug'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'slug' => 'Slug',
            'date' => 'Event Date',
            'location' => 'Location',
            'is_active' => 'Is Active',
            'created_at' => 'Created At',
        ];
    }
}