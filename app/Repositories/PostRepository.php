<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;

use App\Entities\Post;

class PostRepository
{
    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function index()
    {
        return $this->post->get();
    }

    public function find($id)
    {
        return $this->post->find($id);
    }

    public function create(array $data)
    {
        return Auth::user()->posts()->create($data);
    }

    public function update($id, array $data)
    {
        $post = $this->post->find($id);
        return $post ? $post->update($data) : false;
    }

    public function delete($id)
    {
        return $this->post->destroy($id);
    }
}
