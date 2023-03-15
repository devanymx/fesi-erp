<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'code',
      'description',
      'type',
      'cost',
      'price',
      'measurement',
      'photo',
      'taxes',
    ];


    public function teams(){
        return $this->belongsToMany(Team::class);
    }

}
