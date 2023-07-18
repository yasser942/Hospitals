<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    use Translatable;
    public $translatedAttributes = ['name','appointments'];
    protected $fillable =['name','email_verified_at','password','phone','price','appointments' ,'email','local'];

    public  function image (){

        return $this->morphOne(Image::class,'imageable');
    }


}
