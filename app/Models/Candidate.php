<?php

namespace App\Models;

use App\Observers\UserStampObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy([UserStampObserver::class])]
class Candidate extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $fillable = ['name','email','phone','year','job_id','created_by','updated_by','deleted_by'];

    public function skills()
    {
        return $this->belongsToMany(Skill::class,'skill_sets');
    }

    public function Job()
    {
        return $this->hasOne(Job::class);
    }
}
