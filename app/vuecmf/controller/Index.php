<?php
declare (strict_types = 1);

namespace app\vuecmf\controller;


class Index
{
    public function index(): string
    {
        return '<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px;} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:) </h1><p>Welcome to VueCMF V2.1<br/></p><span style="font-size:25px;">[ Powered by <a href="http://www.vuecmf.com/" target="_blank">vuecmf</a> ]</span><script src="https://hm.baidu.com/hm.js?74079f71bcec1421dd89f7c08ed21d68"></script></div>';
    }
}
        