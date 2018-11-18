<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Article;

class BlogController extends Controller
{
    // get Category

    public function getCategory($slug)
    {
        $category = Category::where('slug', $slug)->first();

        return view('blog.category', [
            'category' => $category,
            'articles' => $category->getArticles()->where('published', 1)->paginate(10),
        ]);
    }

    // get Article

    public function getArticle($slug)
    {
        $article = Article::where('slug', $slug)->first();

        return view('blog.article', [
            'article' => $article
        ]);
    }
}
