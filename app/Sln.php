<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sln extends Model
{
<<<<<<< HEAD
    protected $table="sln";
    protected $primaryKey = "sln_id";
    public $timestamps = false;
    protected $guarded = [];
=======
    protected $table="Sln";
    protected $primaryKey="Sln_id";
    //去掉修改的默认时间
    public $timestamps=false;
    //删除的没名单
    protected $guarded=[];
>>>>>>> 77a020a967d5b7ee5e4793ae8028986d93b172ef
}
