<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    
   protected $table = 'orders';
   protected $primaryKey = 'id';
   // protected $fillable = [
   //     'name', 'Address','Phone','percentage'
   
   // ];
   protected $fillable = [
    'patient',
    'doctor',
    'Phone',
    'gender',
    'age',
    'total_price',
];

   protected $casts = [
       'test' => 'array',
       'category'=>'array'
   ];

   public function joynP()
   {
       return $this->belongsTo('App\Models\patient' , 'patient');
   }
}
