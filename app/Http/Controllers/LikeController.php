<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Post $post): RedirectResponse
    {
        $post->likes()->create([
            'user_id' => auth()->id()
        ]);

        return back();
    }

    public function destroy(Post $post): RedirectResponse
    {
        $post->likes()->where('user_id', auth()->id())->delete();

        return back();
    }
}
