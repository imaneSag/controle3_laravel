<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    // Les champs qui peuvent être mass-assignés
    protected $fillable = ['name'];

    // Relation "belongsToMany" avec la classe Livre
    public function livres() //many to many
    {
        return $this->belongsToMany(Livre::class, 'livre_tag');
    }
}

