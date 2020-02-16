<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Snippet extends Model
{
    public $fillable = ['name', 'type', 'html', 'css', 'scss', 'vue', 'react'];
}
