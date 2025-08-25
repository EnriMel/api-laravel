<?php

namespace App\Http\Controllers\Api\V2;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

use function Pest\Laravel\post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // senza filtri e paginazione
        // $posts = Post::all();
        // return response()->json($posts, Response::HTTP_OK);

        // con filtri e paginazione
        $query = Post::query(); // prepariamo la query

        // filtro per data esatta
        if($request->has('published_at')) {
            $query->whereDate('published_at', $request->get('published_at'));
        }

        // filtro per data maggiore di (>=)
        if($request->has('published_at_gte')) {
            $query->whereDate('published_at', '>=', $request->get('published_at_gte'));
        }

        // filtro per data minore di (<=)
        if($request->has('published_at_lte')) {
            $query->whereDate('published_at', '<=', $request->get('published_at_lte'));
        }

        // quanti per pagina
        $perPage = $request->get('per_page', 10);

        $posts = $query->paginate($perPage);

        return response()->json($posts, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required',
            'is_draft' => 'boolean',
            'published_at' => 'nullable|date',
        ]);

        $post = Post::create($validated);

        return response()->json($post, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        return response()->json($post, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required',
            'is_draft' => 'boolean',
            'published_at' => 'nullable|date',
        ]);

        $post->update($validated);

        return response()->json($post, Response::HTTP_OK);
    }

    public function patch(Request $request, string $id)
    {
        $post = Post::findOrFail($id);

        $validated = $request->validate([
            'title' => 'sometimes|string|max:255',
            'body' => 'sometimes',
            'is_draft' => 'sometimes|boolean',
            'published_at' => 'sometimes|nullable|date',
        ]);

        $post->update($validated);

        return response()->json($post, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);

        $post->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
