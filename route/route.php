<?php

// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

Route::get('/', 'cms/Index/index');
Route::get('/about/[:id]', 'cms/About/index')->name('about');
Route::get('/contact/[:id]', 'cms/Contact/index')->name('contact');
Route::get('/news/:cateId/:id', 'cms/News/item')->name('news.item');
Route::get('/news/[:cateId]', 'cms/News/index')->name('news');

Route::get('/product/:cateId/:id', 'cms/Product/item')->name('product.item');
Route::get('/product/[:cateId]', 'cms/Product/index')->name('product');
