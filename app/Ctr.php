<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

<<<<<<< HEAD
class Ctr extends Model
{
    protected $table="ctr";
    protected $primaryKey = "ctr_id";
    public $timestamps = false;
    protected $guarded = [];
=======
class ctr extends Model
{
    protected $table="ctr";
    protected $primaryKey="Ctr_id";
    //去掉修改的默认时间
    public $timestamps=false;
    //删除的没名单
    protected $guarded=[];
>>>>>>> 77a020a967d5b7ee5e4793ae8028986d93b172ef
}
