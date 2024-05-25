<?php

namespace App\Models;

use App\Models\Livre;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['review_text', 'rating', 'livre_id'];

    public function livre()
    {
        return $this->belongsTo(Livre::class);
    }
}
