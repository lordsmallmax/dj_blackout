<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "song_request".
 *
 * @property int $id
 * @property string|null $name
 * @property string $title
 * @property string|null $artist
 * @property string|null $genre
 * @property string|null $duration
 * @property string|null $comment
 * @property string|null $created_at
 */
class SongRequest extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'song_request';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'artist', 'genre', 'duration', 'comment'], 'default', 'value' => null],
            [['title'], 'required'],
            [['duration', 'created_at'], 'safe'],
            [['comment'], 'string'],
            [['name', 'title', 'artist'], 'string', 'max' => 255],
            [['genre'], 'string', 'max' => 100],
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
            'title' => 'Title',
            'artist' => 'Artist',
            'genre' => 'Genre',
            'duration' => 'Duration',
            'comment' => 'Comment',
            'created_at' => 'Created At',
        ];
    }

    public function getEvent()
    {
        return $this->hasOne(Event::class, ['id' => 'event_id']);
    }

}
