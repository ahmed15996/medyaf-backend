<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    use HasFactory;


    protected $guarded = [];


    // party has many parties [phone - count]
    public function users(){
        return $this->hasMany(PartyUser::class , 'party_id');
    }

    // owner party
    public function user(){
       return $this->belongsTo(User::class , 'user_id');
    }

    // Date Converter
    public function getDateAttribute($data)
    {
        $dateFromat = Carbon::createFromFormat('Y-m-d', $data);

        // Get the current app locale
        $locale = app()->getLocale();

        // Tell Carbon to use the current app locale
        Carbon::setlocale($locale);

        $format = $locale === 'ar' ? 'M d' : 'M d';


        // Use `translatedFormat()` to get a translated date string
        return $dateFromat->translatedFormat($format);
    }

}
