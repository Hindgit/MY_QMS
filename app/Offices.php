<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offices extends Model
{
    protected $fillable = [
        'user_id','service_id','display_id','console_id', 
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function console()
    {
        return $this->belongsTo('App\Console');
    }
    
    public function service()
    {
        return $this->belongsTo('App\Services');
    }
    
    public function display()
    {
        return $this->belongsTo('App\Display');
    }
    
}
