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
        $articles = Article::where('category_id', $id)->get();
        $parent = Category::where('id', $id)->first();
        if (count($categories))
            return view('motion', [
                'categories' => $categories,
                //'parent' => $categories[0]->getParent,
                'parent' => $parent,
                'articles' => $articles
            ]);
        return view('motion', [
            'articles' => $articles,
            'parent' => $parent
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
        Category::create([
            'name' => $request->get('category_name'),
            'parent' => $request->get('parent')
        ]);

        return redirect('manage/'.$request->get('parent'));
    }

    public function update(Request $request, $category_id)
    {
        $category = Category::find($category_id)->fill([
            'name' => $request->get('category_name'),
            'parent' => $request->get('parent')
        ])->update();

        return redirect(route('manage', ['id' => $request->get('parent')]));

    }

    public function destroy($id)
    {
        Category::find($id)->delete();

        return redirect()->back();
    }
}
