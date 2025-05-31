<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceOrder extends Model
{
    protected $table = "serviceOrders";
    protected $primaryKey = 'idServiceOrder';
    protected $fillable = ['serviceOrder', 'AssignedTo', 'userId', 'clientId', 'addressId'];
    public $timestamps = true;
}
