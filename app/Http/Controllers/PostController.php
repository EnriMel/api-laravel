<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

use function Pest\Laravel\json;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();
        return response()->json($posts, 200);
    }

    public function show($id) {
        $post = Post::findOrFail($id);
        return response()->json($post, 200);
    }

    public function store($id) {
        $post = Post::findOrFail($id);
        return response()->json($post, 200);
    }

    public function update($id) {
        $post = Post::findOrFail($id);
        return response()->json($post, 200);
    }

    public function patch($id) {
        $post = Post::findOrFail($id);
        return response()->json($post, 200);
    }

    public function destroy($id) {
        $post = Post::findOrFail($id);
        return response()->json($post, 200);
    }
}
