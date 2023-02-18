<?php
namespace app\controller;

use think\facade\View;
use tadmin\model\Nav;

class Controller
{
    public function __construct(Nav $nav)
    {
        $topNavs = $nav->getChildrenNodes(1);

        return View::assign( [
            'topNavs' => $topNavs,
        ]);
    }
}