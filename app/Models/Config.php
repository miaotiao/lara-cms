<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    public function getValueAttribute($val)
    {
        if( is_json($val) && '[' === mb_substr($val, 0,1) ){
            return json_decode($val,true);
        }
        return $val;
    }

    public function setValueAttribute($val)
    {
        $this->attributes['value'] = is_array($val) ? json_encode($val) : $val ;
    }

}
