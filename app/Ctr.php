<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ctr extends Model
{
    protected $table="ctr";
    protected $primaryKey="Ctr_id";
    //去掉修改的默认时间
    public $timestamps=false;
    //删除的没名单
    protected $guarded=[];
}
