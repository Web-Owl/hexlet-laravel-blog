<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::paginate();

        return view('article.index', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('article.show', compact('article'));
    }

    public function create()
    {
        $article = new Article();
        return view('article.create', compact('article'));
    }

    public function store(StoreArticleRequest $request)
    {
        // $data = $request->validate([
        //     'name' => 'required|unique:articles',
        //     'body' => 'required|min:1000',
        // ]);
        $validated = $request->validated();

        $article = new Article();
        $article->fill($validated);
        $article->save();

        $request->session()->flash('status', 'Статья успешно создана');

        return redirect()
            ->route('articles.index');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('article.edit', compact('article'));
    }

    public function update(StoreArticleRequest $request, $id)
    {
        $article = Article::findOrFail($id);
        // $data = $request->validate([
        //     'name' => 'required|unique:articles,name,{$article->id}',
        //     'body' => 'required|min:100',
        // ]);
        $validated = $request->validated();

        $article->fill($validated);
        $article->save();

        $request->session()->flash('status', 'Статья успешно обновлена');

        return redirect()
            ->route('articles.index');
    }

    public function destroy(Request $request, $id)
    {
        $article = Article::find($id);
        if ($article) {
            $article->delete();
        }

        $request->session()->flash('status', 'Статья успешно удалена');

        return redirect()
            ->route('articles.index');
    }
}
