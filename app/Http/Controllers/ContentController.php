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
        $articles = Article::where('category_id', 0)->get();

        if (count($articles) && count($categories))
            return view('manage', [
                'articles' => $articles,
                'categories' => $categories
            ]);
        if (count($categories))
            return view('manage', [
                'categories' => $categories,
            ]);

        if (count($articles))
            return view('manage', [
                'articles' => $articles,
            ]);
        return view('manage');
    }

    public function makeCategoryAddingView($id, $edit = false)
    {
        if ($category = Category::find($id) and $edit)
        {
            $parents = Category::where('parent', $category->parent)->get();
            return view('add_category', [
                'category' => $category,
                'categories' => $parents,
                'category_id' => $category->parent
            ]);
        }
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

    public function makeCategoryEditView($category_id)
    {
        try
        {
            $category = Category::find($category_id);
            $preParent = Category::find($category->parent);
            $parents = Category::where('parent', $preParent->parent ?? 0)->get();
            return view('edit_category', [
                'category' => $category,
                'parents' => $parents ?? null
            ]);
        }
        catch (\Exception $exception)
        {
            dd($exception->getMessage());
            return redirect()->back();
        }
    }

    public function nextLevelById($id)
    {
        $categories = Category::where('parent', $id)->get();
        $articles = Article::with('category')
            ->where('category_id', $id)->get();
        if (count($categories) && count($articles))
            return view('manage', [
                'categories' => $categories,
                'articles' => $articles,
                'category_id' => $id
            ]);
        $articles = Article::with('category')
        ->where('category_id', $id)->get();
        if (count($articles))
            return view('manage', [
                'articles' => $articles,
                'category_id' => $id
            ]);
        if (count($categories))
            return view('manage', [
                'categories' => $categories,
                'category_id' => $id
            ]);
        return view('manage', [
            'category_id' => $id
        ]);
    }

    public function makeArticleEditView($article_id)
    {
        return view('edit_article', [
            'article' => Article::find($article_id)
        ]);
    }
}
