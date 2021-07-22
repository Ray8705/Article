<?php

namespace App\Repositories;

use App\Models\Comment;
use Yish\Generators\Foundation\Repository\Repository;

class CommentRepository
{
    protected $model;

    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function getCommentAll()
    {
        return $this->comment;
    }

    public function getCommentOne($id)
    {
        return $this->comment->where('id', $id)->with(['Article:id, title'])->first();
    }

    public function getCommentForDetail($id)
    {
        return $this->comment->where('article_id', $id)->get();
    }
}
