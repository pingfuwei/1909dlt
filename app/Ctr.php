<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ctr extends Model
{
    protected $table="ctr";
    protected $primaryKey = "ctr_id";
    public $timestamps = false;
    protected $guarded = [];
}
