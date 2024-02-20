<?php

namespace App\Models;

use App\Observers\UserStampObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $fillable = ['name','created_by','updated_by','deleted_by'];

    public function __construct()
    {
        parent::__construct();

        static::observe(UserStampObserver::class);
    }

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }
}
