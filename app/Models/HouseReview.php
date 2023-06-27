<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class HouseReview extends Model
{
    use HasFactory, SoftDeletes;

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

    public function reviewBy(){
        return $this->belongsTo(User::class,'user_id', 'id');
    }

    public function reviewedHouse(){
        return $this->belongsTo(AddNewHouse::class,'house_id', 'id');
    }
}
