<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "music_lists".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $artist
 * @property string|null $duration
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class music_lists extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'music_lists';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'artist', 'duration'], 'default', 'value' => null],
            [['duration', 'created_at', 'updated_at'], 'safe'],
            [['title', 'artist'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'artist' => 'Artist',
            'duration' => 'Duration',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

}
