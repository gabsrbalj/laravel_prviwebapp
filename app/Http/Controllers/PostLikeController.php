<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }
    public function store(Post $post, Request $request)
    {
        //spremanje oznaka sviđa mi se
        if($post->likedBy($request->user())){
            return response(null,409);
        }
        // ako je već označeno sa sviđa mi se returnamo prazan response

        $post->likes()->create([
            'user_id' => $request->user()->id,
        ]);

        return back();
    }
    public function destroy(Post $post,Request $request){
        $request->user()->likes()->where('post_id',$post->id)->delete();
        return back();
    }
}
