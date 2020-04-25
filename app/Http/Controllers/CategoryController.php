<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::where('parent', false)->get();
        return view('motion', [
            'categories' => $categories
        ]);
    }

    public function nextLevel($id)
    {
        $categories = Category::with('getParent')
        ->where('parent', $id)->get();
//        dd($categories);
        if (count($categories))
            return view('motion', [
                'categories' => $categories
            ]);
        $articles = Article::where('category_id', $id)->get();
        return view('category', [
            'articles' => $articles
        ]);
    }

    public function create(Request $request)
    {
        $validationRules = [
            'category_name' => 'required',
        ];
        if ($request->get('parent') != 0)
            $validationRules['parent'] = 'required|exists:categories,id';
        $this->validate($request, $validationRules);

        $category = Category::create([
            'name' => $request->get('category_name'),
            'parent' => $request->get('parent')
        ]);

        $category->save();

        return redirect('/manage/'.$request->get('parent'));
    }

    public function destroy($id)
    {
        Category::find($id)->delete();

        return redirect()->back();
    }
}
