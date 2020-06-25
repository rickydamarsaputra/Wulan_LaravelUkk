<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeOfPayment extends Model
{
    protected $fillable = ['payment_name', 'price'];
}
