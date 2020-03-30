<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acc extends Model
{
    protected $table="acc";
    protected $primaryKey="acc_id";
    //去掉修改的默认时间
    public $timestamps=false;
    //删除的没名单
    protected $guarded=[];
}
