<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Repositories\ArticleRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    public function articleList()
    {
        $articles = app(ArticleRepository::class)->getArticleAll();
        return response()->json($articles);
    }

    public function articleDetail($id)
    {
        $article = app(ArticleRepository::class)->getArticleQuery($id);

        if ($article == null) {
            return "該文章不存在！！";
        }

        return response()->json($article);
    }

    public function articleInsert(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:20',
            'content' => 'required',
        ]);

        if ($validator->fails()) {
            return $validator->errors()->first();
        }

        $data = $this->getData($request);

        $article = Article::create($data);
        return response()->json($article);
    }

    private function getData($request)
    {
        return [
            'title' => $request->title,
            'content' => $request->content,
        ];
    }
}
