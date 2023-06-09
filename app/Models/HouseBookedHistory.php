<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class HouseBookedHistory extends Model
{
    use HasFactory;

    public $timestamps = 'true';
    protected $guarded = [];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($post) {
            $post->created_by = Auth::user()->id;
            $post->updated_by = Auth::user()->id;
        });

        static::updating(function ($post) {
            $post->updated_by = Auth::user()->id;
        });
    }

    public function bookedBy(){
        return $this->belongsTo(User::class,'user_id', 'id');
    }

    public function bookedHouseDetails(){
        return $this->belongsTo(AddNewHouse::class,'house_id', 'id');
    }
}
