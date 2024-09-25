<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        return view('post.add-new-post');
    }

    //store-new-post
    public function store(Request $request): RedirectResponse{

        $request->validate([
            'news_title' => 'required',
        ]);

        // image
        $imageName = null;
        if(isset($request->image)){
            $imageName = time() . '.' . $request->image->extension();
            
            $request->image->move(public_path('images'), $imageName);
        }

        $arrayPost = new Post;

        $arrayPost->news_title = $request->news_title;
        $arrayPost->reporter_name = $request->reporter_name;
        $arrayPost->news_body = $request->news_body;
        $arrayPost->image = $imageName;

        $arrayPost->save();

        return redirect()->back()->with('success', 'Your post has been Posted successfully');
    }

    // show post
    public function show(){
        $allPostCollection = Post::all()->reverse();
        return view('post.all-posts', [
            'allPostCollection' => $allPostCollection,
        ]);
    }

    // allPostsDesign
    public function allPostsDesign(){
        $allPostForDesignCollection = Post::all()->reverse();
        return view('post.all-post-for-design', [
            'allPostForDesignCollection' => $allPostForDesignCollection
        ]);
    }

    //single post design
    public function singlePost($id){
        $allPostForCollectionMore = Post::all()->reverse();
        

        $singlePost = Post::findOrFail($id);
        return view('post.single-post', [
            'singlePost' => $singlePost,
            'allPostForCollectionMore' => $allPostForCollectionMore,
        ]);
    }
}
