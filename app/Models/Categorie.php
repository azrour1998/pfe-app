<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Historique;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'categorie',
      
       
    ];
    
    
    

}