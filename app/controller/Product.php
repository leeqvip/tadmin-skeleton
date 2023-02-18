<?php

namespace app\controller;

use tadmin\model\Category;
use tadmin\model\Nav;

class Product extends Controller
{
    protected $category;

    public function __construct(Category $category, Nav $nav)
    {
        parent::__construct($nav);
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

    private function cates()
    {
        return $this->category->where('parent_id', 2)->order('sort', 'desc')->select();
    }
}
