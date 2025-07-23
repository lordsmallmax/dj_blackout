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
 * @property User $user
 * @property Eventype $event
 */
class MusicList extends \yii\db\ActiveRecord
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
            [['user_id', 'event_id', 'title'], 'required'],
            [['user_id', 'event_id'], 'integer'],
            [['title', 'artist'], 'string', 'max' => 255],
            [['created_at', 'updated_at'], 'safe'],
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
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    public function getEvent()
    {
        return $this->hasOne(Event::class, ['id' => 'event_id']);
    }

}
