<?php

namespace Loyalty;

use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    protected $fillable = ['title','amount', 'points', 'description'];
}
