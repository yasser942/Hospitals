<?php

namespace App\Models;

// 1. To specify package’s class you are using
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    use Translatable; // 2. To add translation methods

    // 3. To define which attributes needs to be translated
    public $translatedAttributes = ['name'];
    protected $fillable =['name'];

    public  function doctors (){

        return $this->hasMany(Doctor::class,);
    }
}
