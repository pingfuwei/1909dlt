<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sln extends Model
{
    protected $table="Sln";
    protected $primaryKey="Sln_id";
    //去掉修改的默认时间
    public $timestamps=false;
    //删除的没名单
    protected $guarded=[];
}
