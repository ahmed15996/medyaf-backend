<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventUser extends Model
{
    use HasFactory;


    protected $guarded = [];

    public function event(){
        return $this->belongsTo(Event::class , 'event_id');
    }

    public function user(){
        return $this->belongsTo(User::class , 'user_id');
    }


}
