<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sln extends Model
{
    protected $table="sln";
    protected $primaryKey = "sln_id";
    public $timestamps = false;
    protected $guarded = [];
}
