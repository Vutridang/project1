<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PayOrder extends Model
{
    SoftDeletes;
    protected $table = 'pay_order';
}
