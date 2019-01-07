<?php

namespace app\cms\controller;

use tadmin\model\Category;

class Product
{
    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index($cateId = null)
    {
        $cate = $this->category->find(2);

        $cate->articles = $cate->articles()->order('sort', 'desc')->order('id', 'desc')->paginate(20);

        return view('/product', [
            'cate' => $cate,
        ]);
    }

    public function item($cateId, $id)
    {
        $leftCates = $this->cates();

        $cate = $this->category->find($cateId);

        $article = $cate->articles()->find($id);

        return view('/product-item', [
            'leftCates' => $leftCates,
            'cate' => $cate,
            'article' => $article,
        ]);
    }
}
