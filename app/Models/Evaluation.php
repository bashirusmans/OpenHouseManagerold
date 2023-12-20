<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $table = 'evaluations';
    protected $primaryKey = 'evaluation_id';
    protected $fillable = ['project_id', 'evaluator_user_id', 'evaluation_date', 'evaluation_score', 'evaluation_comments'];
}
