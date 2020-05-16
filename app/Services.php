<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $fillable = [
        'service_tp_id', 'name','description','start_time','end_time','start_counter','end_counter', 'color','background_color',
    ];
    
           
}
