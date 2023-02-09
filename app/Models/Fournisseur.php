<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    protected $fillable = [
        'name',
        'adresse',
        'telephone',
        'added_by',
    ];

    public function article()
    {
        return $this->hasmany('App\Models\Article','id','fournisseur_id');
    }
}
