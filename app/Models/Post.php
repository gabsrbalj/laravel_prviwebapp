<?php

namespace App\Models;

use App\Models\Like;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'body'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function likedBy(User $user) //metoda uzima objekte
    {
        return $this->likes->contains('user_id', $user->id); //laravel kolekcijska metoda da se vidi kolekcija objekta

        // na odgovrajaucem kljucu i je li user id unutar lajkova za model
        //vraća true ili false
    }


}
