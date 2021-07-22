<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Repositories\ArticleRepository;
use App\Repositories\CommentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    public function articleList()
    {
        $articles = app(ArticleRepository::class)->getArticleAll();
        return view('article', ['articles' => $articles]);
    }

    public function articleDetail($id)
    {
        $article = app(ArticleRepository::class)->getArticleQuery($id);
        $comments = app(CommentRepository::class)->getCommentForDetail($id);

        if ($article == null) {
            return "該文章不存在！！";
        }

        return view('article_detail', ['article' => $article, 'comments' => $comments]);
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
