<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    use HasFactory;

    // Les champs qui peuvent être mass-assignés
    protected $fillable = ['titre', 'pages', 'description', 'image', 'categorie_id'];

    // Relation "belongsTo" avec la classe Categorie
    public function categorie() //one to many
    {
        return $this->belongsTo(Categorie::class);
    }
    
    // Relation "hasOne" avec la classe Author
    public function author() //one to one 
    {
        return $this->hasOne(Author::class);
    }

    // Relation "hasMany" avec la classe Review
    public function reviews() //one to many
    {
        return $this->hasMany(Review::class);
    }

    // Relation "belongsToMany" avec la classe Tag
    public function tags() //many to many
    {
        return $this->belongsToMany(Tag::class, 'livre_tag');
    }
}
