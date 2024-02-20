<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Candidate extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function skills()
    {
        return $this->belongsToMany(Skill::class,'skill_sets');
    }

    public function Job()
    {
        return $this->hasOne(Job::class);
    }
}
