<?php

namespace App\Repositories;

use App\Models\Article;
use Yish\Generators\Foundation\Repository\Repository;

class ArticleRepository
{
    protected $model;

    public function __construct(Article $articles)
    {
        $this->article = $articles;
    }

    public function getArticleAll()
    {
        return $this->article->all();
    }

    public function getArticleQuery($id)
    {
        return $this->article->where('id', $id)->with(['comments'])->first();
    }
}
