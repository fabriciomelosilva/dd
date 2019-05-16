<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classificado extends Model
{
    protected $fillable = [
        'ed_year','ed_month','ed_day','ed_file_name', 'url', 'ed_status','ed_capa'
    ];
}
