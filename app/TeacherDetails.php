<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeacherDetails extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description', 'file', 'date_hired', 'phone_number', 'photo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        //'date_hired' => 'datetime',
    ];
}
