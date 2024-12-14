<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{
    use HasFactory;
    protected $fillable = ['ay_code', 'year_from', 'year_to', 'semester', 'status'];

    public function violations()
    {
        return $this->hasMany(Violation::class);
    }
}
