<?php

namespace App\Models;

use App\Models\Album;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AlbumImage extends Model
{
    use HasFactory;
    protected $fillable = ['image_name','album_id','image'];
    public function album(){
        return $this->belongsTo(Album::class);
    }


    public function getImageAttribute($value)
    {
        if ($value)
            return asset('attachments/' . $value);

        else
            return null;
    }

    public function setImageAttribute($value)
    {
        if ($value) {
            $this->attributes['image'] = $value->store('albums', 'attachment');
        }
    }
}
