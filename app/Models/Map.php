<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    use HasFactory;

      protected $fillable = [
          'first_lat',
          'first_long',
          'second_lat',
          'second_long'
];
}
