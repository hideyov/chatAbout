<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'profile',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
        
    public function chats()
    {
        return $this->hasMany(Chat::class);
    }
        
    public function followings()
    {
        return $this->belongsToMany(User::class, 'user_follow', 'user_id', 'follow_id')->withTimestamps();
    }
        
    public function followers()
    {
        return $this->belongsToMany(User::class, 'user_follow', 'follow_id', 'user_id')->withTimestamps();
    }
        
    public function follow($userId)
    {
        // 既にフォローしているかの確認
        $exist = $this->is_following($userId);
        // 相手が自分自身ではないかの確認
        $its_me = $this->id == $userId;

        if ($exist || $its_me) {
            // 既にフォローしていれば何もしない
            return false;
        } else {
            // 未フォローであればフォローする
            $this->followings()->attach($userId);
            return true;
        }
    }

    public function unfollow($userId)
    {
        // 既にフォローしているかの確認
        $exist = $this->is_following($userId);
        // 相手が自分自身ではないかの確認
        $its_me = $this->id == $userId;

        if ($exist && !$its_me) {
            // 既にフォローしていればフォローを外す
            $this->followings()->detach($userId);
            return true;
        } else {
            // 未フォローであれば何もしない
            return false;
        }
    }

    public function is_following($userId)
    {
        return $this->followings()->where('follow_id', $userId)->exists();
    }

    public function feed_chats()
    {
        $follow_user_ids = $this->followings()->pluck('users.id')->toArray();
        $follow_user_ids[] = $this->id;
			
        return Chat::whereIn('user_id', $follow_user_ids);
    }

    /*
    お気に入りの一覧を取得する機能
    */

    public function favorites()
    {
        return $this->belongsToMany(Chat::class, 'favorites', 'user_id', 'chat_id')->withTimestamps();
    }

    public function favour($chatId)
    {
        // 既にお気に入りに入れているかの確認
        $favouring = $this->is_favouring($chatId);

        if ($favouring) {
        // 既にお気に入りに入れていれば何もしない
            return false;
        } else {
        // まだ入れてなければ、お気に入りに入れる
            $this->favorites()->attach($chatId);
            return true;
        }
    }

    public function unfavour($chatId)
    {
        // 既にお気に入りに入れているかの確認
        $favouring = $this->is_favouring($chatId);

        if ($favouring) {
            // 既にお気に入りに入れていればお気に入りから削除する
            $this->favorites()->detach($chatId);
            return true;
        } else {
            // まだ入れてなければ、何もしない
            return false;
        }
    }

    public function is_favouring($chatId)
    {
        return $this->favorites()->where('chat_id', $chatId)->exists();
    }
}
