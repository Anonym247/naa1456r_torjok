<?php


namespace App\Http\Controllers;


use App\Article;
use DemeterChain\A;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function getArticleById($id)
    {
        $article = Article::find($id);

        return view('motion', [
            'article' => $article
        ]);
    }

    public function destroy($id)
    {
        $article = Article::find($id);
        if ($article)
            $article->delete();

        return redirect()->back();
    }

    public function create(Request $request, $category_id)
    {
        $this->validate($request, [
            'article_name' => 'required',
            'note' => 'required',
        ]);
        $article = new Article();
        $article->fill([
            'name' => $request->get('article_name'),
            'category_id' => $category_id,
            'note' => $request->get('note')
        ]);

        if ($request->hasFile('media'))
            $path = $request->file('media')->store('/media/' . $category_id);
        $path = $path ?? '';
        $article->fill([
            'media' => $path
        ])->save();

        return redirect('/manage/'.$category_id);
    }

    public function update(Request $request, $article_id)
    {
        $this->validate($request, [
            'article_name' => 'required',
            'note' => 'required',
        ]);
        $article = Article::find($article_id);
        $article->name = $request->get('article_name');
        $article->note = $request->get('note');

        if ($request->hasFile('media'))
        {
            try {
                $path = $request->file('media')->store('/media/' . $article->category_id);
                $article->fill([
                    'media' => $path
                ]);
            }
            catch (\Exception $exception)
            {
                return response()->json(['error' => 'internal error'], 404);
            }
        }
        $article->update();

        return redirect('/manage/'.$article->category_id);
    }
}
