<?php

namespace app\cms\widget;

use think\Controller;
use tadmin\model\Nav;
use tadmin\model\Link;

class Index extends Controller
{
    protected $nav;

    public function __construct(Nav $nav)
    {
        parent::__construct();
        $this->nav = $nav;
    }

    public function header()
    {
        $topNavs = $this->nav->getChildrenNodes(1);

        return $this->fetch('/widget/header', [
            'topNavs' => $topNavs,
        ]);
    }

    public function footer(Link $link)
    {
        return $this->fetch('/widget/footer', [
        ]);
    }
}
