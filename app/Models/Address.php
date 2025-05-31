<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = "addresses";
    protected $primaryKey = 'idAddress';
    protected $fillable = ['Street', 'Neighborhood', 'City', 'State', 'References'];
    public $timestamps = true;
}
