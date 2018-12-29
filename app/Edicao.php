<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Edicao extends Model
{
    protected $fillable = [
        //'data-edicao', 'url','publicado'
        'ed_year','ed_mounth','ed_day','ed_file_name', 'url', 'ed_status'
    ];
}
