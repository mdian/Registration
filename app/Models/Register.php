<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{

    protected $table = 'registrations';
    public $timestamps = true;
    protected $fillable = array('fullName', 'age', 'ageUnit', 'type', 'address', 'phoneNum', 'appointmentDay', 'clinic', 'matchDate','hospitalName');


    public static function rules()
    {

        return [


            'fullName' => 'required|min:10|max:40',
            'age' => 'required|min:1|max:150',
            // 'dob' => 'required|date|before:tomorrow',
            'address' => 'required|min:3|max:40',
            'phoneNum' => 'required|digits_between:8,16',
            'agetype' => 'required',
            'type' => 'required',
            'clinic' => 'required',
            'appointmentDay' => 'required|in:السبت,الأثنين,الثلاثاء,الأربعاء,الخميس,الأحد'








        ];
    }
}
