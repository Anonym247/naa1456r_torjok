<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index()
    {
        $categories = Category::where('parent', 0)->get();
        if (count($categories))
            return view('manage', [
                'categories' => $categories
            ]);
        return view('manage');
    }

    public function makeCategoryAddingView($id)
    {
        $categories = Category::where('parent', $id)->get();
        if (count($categories))
            return view('add_category', [
                'categories' => $categories,
                'category_id' => $id
            ]);
        return view('add_category', [
            'category_id' => $id
        ]);
    }

    public function nextLevelById($id)
    {
        $categories = Category::where('parent', $id)->get();
        if (count($categories))
            return view('manage', [
                'categories' => $categories
            ]);
        $articles = Article::with('category')
        ->where('category_id', $id)->get();
        if (count($articles))
            return view('manage', [
                'articles' => $articles,
                'category_id' => $id
            ]);
        return view('manage', [
            'category_id' => $id
        ]);
    }
}
