<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function department()
    {
        return $this->hasOne(Department::class, 'id', 'department_id');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

}
