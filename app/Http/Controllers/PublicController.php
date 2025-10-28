<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PublicController extends Controller
{
    public function index() {
        $posts = Post::with('images', 'user', 'tags')->withCount('comments', 'likes')->latest()->simplePaginate(16);
        return view('welcome', compact('posts'));
    }

    public function post(Post $post) {
        return view('post', compact('post'));
    }

    public function page1() {
        return view('page1');
    }

    public function page2() {
        return view('page2');
    }

    public function tag(Tag $tag) {
        $posts = $tag->posts()->with('images', 'user', 'tags')->withCount('comments', 'likes')->latest()->simplePaginate(16);
        return view('welcome', compact('posts'));
    }
    public function category(Category $category) {
        $posts = $category->posts()->with('images', 'user', 'tags')->withCount('comments', 'likes')->latest()->simplePaginate(16);
        return view('welcome', compact('posts'));
    }
}
