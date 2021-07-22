<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use App\Repositories\CommentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function commentList()
    {
        $comments = app(CommentRepository::class)->getCommentAll();
    }

    public function commentOne()
    {
        $comments = app(CommentRepository::class)->getCommentAll();
    }

    public function commentInsert(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'article_id' => 'required',
            'content' => 'required',
        ]);

        if ($validator->fails()) {
            return $validator->errors()->first();
        }

        if (!$this->check_article($request->article_id)) {
            return "該文章不存在！！";
        }

        $comment = $this->getData($request);

        $data = Comment::create($comment);
        return response()->json($data);
    }

    private function getData($request)
    {
        return [
            'article_id' => $request->article_id,
            'content' => $request->content,
        ];
    }

    private function check_article($id)
    {
        $check = Article::where('id', $id)
            ->get();
        if ($check->isEmpty())
            return false;
        else
            return true;
    }
}
