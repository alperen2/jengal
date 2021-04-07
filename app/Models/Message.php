<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    public function getRecipient()
    {
        return $this->hasOne(User::class ,'id', 'recipient');
    }

    public function getSender()
    {
        return $this->hasOne(User::class ,'id', 'sender');
    }
}
