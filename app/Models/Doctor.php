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
    protected $fillable =['name','email_verified_at','password','phone' ,'email','section_id','status',];

    public  function image (){

        return $this->morphOne(Image::class,'imageable');
    }

    public  function section (){

        return $this->belongsTo(Section::class,);
    }
    public function doctorappointments()
    {
        return $this->belongsToMany(Appointment::class,'appointment_doctor');
    }


}
