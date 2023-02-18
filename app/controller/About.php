<?php

namespace app\controller;

use tadmin\model\Category;

class About extends Controller
{
    public function index(Category $category, $id = null)
    {
        $leftCates = $category->where('parent_id', 3)->order('sort', 'desc')->select();

        if (is_null($id) && $leftCates->offsetExists(0)) {
            $id = $leftCates->offsetGet(0)->id;
        }

        $cate = $category->find($id);

        return view('/about', [
            'leftCates' => $leftCates,
            'cate' => $cate,
        ]);
    }
}
