<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    /**
     * @var string
     */
    protected $primaryKey = 'step_id';

    /**
     * @var array
     */
    protected $fillable = ['steps', 'user_id', 'date'];
}
