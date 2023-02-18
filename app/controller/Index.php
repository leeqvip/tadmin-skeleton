<?php

namespace app\controller;

use tadmin\model\Advertising;
use tadmin\model\Article;
use tadmin\model\Link;
use tadmin\model\Nav;
use tadmin\model\Single;

class Index extends Controller
{

    public function index(Nav $nav, Article $article, Single $single, Advertising $ad, Link $link)
    {
        $newsList = $article->whereRaw('find_in_set(?, category_parent_path)', [1])->order('id', 'desc')->limit(5)->select();
        $casesList = $article->whereRaw('find_in_set(?, category_parent_path)', [2])->order('id', 'desc')->limit(4)->select();
        $about = $single->where('category_id', 4)->find();
        $banners = $ad->where('block', 'banner')->order('sort')->select();
        $friendLink = $link->where('block', 'friendlink')->order('sort')->select();

        return view('/index', [
            'newsList' => $newsList,
            'casesList' => $casesList,
            'about' => $about,
            'banners' => $banners,
            'friendLink' => $friendLink,
        ]);
    }
}
