<?php

namespace App\Http\Controllers;

use App\Models\Post;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware(['auth'])->only(['store','destroy']);
    }
    public function index(){
            $posts = Post::latest()->with(['user','likes'])->paginate(10);
            return view('posts.index', [
                'posts' => $posts
            ]);
    }

    public function store(Request $request){
       $this->validate($request, [
           'body' => 'required'
       ]);

       $request->user()->posts()->create([
           'body' => $request->body
       ]);

       return back();
    }

    public function destroy(Post $post){
        $this->authorize('delete',$post);
        // metoda delete povezana
        $post->delete();
        return back(); //vraća korisnika natrag
    }


}
