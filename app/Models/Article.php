<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    protected $fillable = ["titre", "description", "image", "user_id", "categorie_id"];
    
    
    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }

    public function etiquettes(){
        return $this->belongsToMany(Etiquette::class);
    }
}
