<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    protected $fillable = ['companies_id', 'name', 'email'];
    public $timestamps = \true;
}
