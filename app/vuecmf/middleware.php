<?php
return [
    // Session初始化
    \think\middleware\SessionInit::class,
    //跨域设置
    \app\vuecmf\middleware\CrossDomain::class
];
