<?php

namespace app\controller;

use tadmin\model\Category;

class Contact extends Controller
{
    public function index(Category $category, $id = null)
    {
        $leftCates = $category->where('parent_id', 8)->order('sort', 'desc')->select();

        if (is_null($id) && $leftCates->offsetExists(0)) {
            $id = $leftCates->offsetGet(0)->id;
        }

        $cate = $category->find($id);

        return view('/contact', [
            'leftCates' => $leftCates,
            'cate' => $cate,
        ]);
    }
}
