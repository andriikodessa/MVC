<?php

namespace Hillel\Controllers;

use Hillel\Models\Post;

class PostController
{
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', ['posts' => $posts]);
    }

    public function form()
    {
        $request = request();

        $data = [];

//        $categories = \Hillel\Models\Category::all();

        if ($request->method() == 'POST') {
            if(!$request->has('id')) {
                Post::create([
                    'title' => $request->get('title'),
                    'slug' => $request->get('slug'),
                    'body' => $request->get('body'),
//                    'category_id' => $categories->random()->id,
                ]);
            } else {
                $post = Post::find($_POST['id']);
                $post->update([
                    'title' => $request->get('title'),
                    'slug' => $request->get('slug'),
                    'body' => $request->get('body'),
                ]);
            }

            header('Location: /posts');
        }

        if (!empty($id = $request->route()->parameter('id'))) {
            $data['post'] = Post::find($id);
        }

        return view('posts.form', $data);
    }

    public function delete()
    {
        $post = Post::find(request()->route()->parameter('id'));
        $post->delete();

        header('Location: /posts');
    }
}
