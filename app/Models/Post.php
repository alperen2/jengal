<?php

namespace App\Models;

use App\CustomHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Post extends Model
{
    use HasFactory;

    public function getUser(){
        return $this->hasOne(User::class ,'id', 'user_id');
    }

    public function getTagsName(){
        return CustomHelpers::getTagsName(json_decode($this->tags, true));
    }
}
