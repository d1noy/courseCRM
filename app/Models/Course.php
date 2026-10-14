<?php

namespace App\Models;

use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Course extends Model
{
    protected $fillable = [
      'name',
      'description',
      'url',
      'category_id',
      'hours',
    ];


    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

}
