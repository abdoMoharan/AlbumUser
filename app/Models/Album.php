<?php

namespace App\Models;

use App\Models\User;
use App\Models\AlbumImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Album extends Model
{
    use HasFactory;
    protected $fillable = ['name','user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function images(){
        return $this->hasMany(AlbumImage::class);
    }
}
