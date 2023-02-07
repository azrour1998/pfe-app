<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    protected $fillable = [
        'name',
    ];

    public function article()
    {
        return $this->hasmany('App\Models\Article','id','fournisseur_id');
    }
}
