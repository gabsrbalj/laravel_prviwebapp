<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;
    //tu možemo kreirati metode
    // koje će govoriti što smijemo,a što ne

    public function delete(User $user,Post $post){
        return $user->id === $post->user_id; //importano iz ownedBy metode iz modela
        //vraća true ako se id slažu
    }
}

