<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forex extends Model
{
    protected $table = 'forex';
    
    protected $fillable=array('currency','currencyrate','created_at', 'updated_at');
}
