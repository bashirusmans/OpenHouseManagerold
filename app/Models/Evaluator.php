<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluator extends Model
{
    protected $table = 'evaluators';
    protected $primaryKey = 'evaluator_id';
    protected $fillable = ['user_id', 'preferences'];
}
