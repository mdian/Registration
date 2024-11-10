<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{

    protected $table = 'clinics';
    public $timestamps = true;
    protected $fillable = array('clinicName', 'dayNum');



    public static function rules()
    {

        return [


            'clinicName' => 'required|min:3|max:40',
            // 'dob' => 'required|date|before:tomorrow',
            'dayNum' => 'required|min:1|max:300',
            // 'weekNum' => 'required|min:1|max:1500',


        ];
    }
}
