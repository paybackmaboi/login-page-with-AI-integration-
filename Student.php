<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_no', 'last_name', 'first_name', 'middle_name', 
        'program_id', 'section_id', 'address', 'contact_no', 'photo_url'
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function violations()
    {
        return $this->hasMany(Violation::class);
    }
}
