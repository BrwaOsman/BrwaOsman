<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class test extends Model
{
    use HasFactory;
    protected $table = 'tests';
    protected $primaryKey = 'id';
    // protected $fillable = [
    //     'name'
    
    // ];


    protected $casts = [
        'name' => 'array',
        'Unit' => 'array',
        'Price' => 'array',
        'Min_Color' => 'array',
        'Max_Color' => 'array',
        'Range' => 'array',
        
      ];
      
}
// $table->string('name');
// $table->string('Unit');
// $table->string('Price');
// $table->string('Min_Color');
// $table->string('Max_Color');
// $table->string('min_male');
// $table->string('max_male');
// $table->string('min_female');
// $table->string('max_female');