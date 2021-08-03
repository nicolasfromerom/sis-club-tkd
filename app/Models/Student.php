<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'last_name',
        'date_birth',
        'payment',
        'enrollment',
        'date_start',
        'code',
        'dni',

        //foreign keys
        'academic_degree_id',
        'blood_type_id',
    ];

    public function blood_type()
    {
        return $this->hasOne(BloodType::class);
    }

    public function academic_degree()
    {
        return $this->hasOne(AcademicDegree::class);
    }

    public function agents()
    {
        return $this->belongsToMany(Agent::class);
    }
    
    public function addresses()
    {
        return $this->morphMany(Address::class, 'addressable');
    }

    public function phones()
    {
        return $this->morphMany(Phone::class, 'phoneable');
    }
}
