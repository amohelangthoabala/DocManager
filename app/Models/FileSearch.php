<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileSearch extends Model
{
    use HasFactory;

    protected $fillable = [
        'fname',
        'count',
    ];


}
