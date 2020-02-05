<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PostService;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        return response()->json($this->postService->getPosts());
    }

    public function store(Request $request)
    {
        $post = $this->postService->storePost($request->only(['title', 'content']));

        if ($post) {
            return response()->json(['status' => 0]);
        }

        return response()->json(['status' => 1, 'message' => 'Internal Server Error'], 500);
    }

    public function show($id)
    {
        $post = $this->postService->getPost($id);

        if ($post) {
            return response()->json($post);    
        }

        return response()->json(['message' => 'Not Found'], 404);
    }

    public function update(Request $request, $id)
    {
        $result = $this->postService->updatePost($id, $request->only(['title', 'content']));

        if ($result) {
            return response()->json(['status' => 0]);
        }

        return response()->json(['status' => 1, 'message' => 'Not Found'], 404);
    }

    public function destroy($id)
    {
        $result = $this->postService->deletePost($id);

        if ($result) {
            return response()->json(['status' => 0]);
        }

        return response()->json(['status' => 1, 'message' => 'Internal Server Error'], 500);
    }
}
