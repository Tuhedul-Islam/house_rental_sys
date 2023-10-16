<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class ContactUs extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'contact_us';
    public $timestamps = 'true';
    protected $guarded = [];

    public static function boot()
    {
        parent::boot();
        if (!empty(Auth::user())){
            static::creating(function ($post) {
                $post->created_by = Auth::user()->id;
                $post->updated_by = Auth::user()->id;
            });

            static::updating(function ($post) {
                $post->updated_by = Auth::user()->id;
            });
        }
    }
}
