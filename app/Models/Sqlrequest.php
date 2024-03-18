<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sqlrequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'IdProjet',
        'VersionProjet', 
        'SQLRequetes'
        ];
}
