<?php

namespace app\cms\controller;

use tadmin\model\Category;

class News
{
    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index($cateId = null)
    {
        $leftCates = $this->cates();
        if (is_null($cateId) && $leftCates->offsetExists(0)) {
            $cateId = $leftCates->offsetGet(0)->id;
        }

        $cate = $this->category->find($cateId);

        $cate->articles = $this->category->articles()->order('sort', 'desc')->order('id', 'desc')->paginate(5);

        return view('/news', [
            'leftCates' => $leftCates,
            'cate' => $cate,
        ]);
    }

    public function item($cateId, $id)
    {
        $leftCates = $this->cates();

        $cate = $this->category->find($cateId);

        $article = $cate->articles()->find($id);

        return view('/news-item', [
            'leftCates' => $leftCates,
            'cate' => $cate,
            'article' => $article,
        ]);
    }

    private function cates()
    {
        return $this->category->where('parent_id', 1)->order('sort', 'desc')->select();
    }
}
