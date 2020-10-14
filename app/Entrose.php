<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Entrose extends Model
{
    protected $table = 'entroses';
    protected $primaryKey = 'F_id';
  
    protected $appends = ['image_str']; 
  
    public function getImageStrAttribute()
    {
      $picName = $this->attributes['image_name'];
      $img = Storage::disk('public')->get('rosePic/'. $picName);
      $imgStr = base64_encode($img);

      return $imgStr;
    }
}
