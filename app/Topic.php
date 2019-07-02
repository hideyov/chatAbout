<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
	protected $fillable = ['title'];

	public function chat()
	{
		return $this->hasMany(Chat::class);
	}

    public function user()
    {
        return $this->belongsToMany(User::class, 'interests', 'topic_id', 'user_id')->withTimestamps();
    }
}
