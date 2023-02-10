<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'designation',
        'quantity',
        'price',
        'fournisseur_id',
        'last_arrival',
        'minimal_quantity',
        'added_by',
        'image',
    ];
    
    public function fournisseur()
    {
        return $this->hasMany('App\Models\Fournisseur','fournisseur_id','id');
    }
    

}
