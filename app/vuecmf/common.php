<?php
// +----------------------------------------------------------------------
// | Copyright (c) 2019~2022 http://www.vuecmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( https://github.com/vuecmf/framework/blob/main/LICENSE )
// +----------------------------------------------------------------------
// | Author: vuecmf <tulihua2004@126.com>
// +----------------------------------------------------------------------

/**
 * ajax请求成功返回的数据结构
 * @param string $msg                 提示信息
 * @param array|boolean|string $data  返回的数据
 * @param int $code                   状态码
 * @return \think\response\Json
 */
function ajaxSuccess(string $msg = '', $data = [], int $code = 0): \think\response\Json
{
    return json([
        'data'  => $data,
        'msg'   => $msg,
        'code'  => $code
    ]);
}

/**
 * ajax请求失败返回的数据结构
 * @param object|string $exception  异常对象|异常信息
 * @param int $code          状态码
 * @param array $data        返回的数据
 * @return \think\response\Json
 */
function ajaxFail($exception, int $code = 1000, array $data = []): \think\response\Json
{
    $msg = '异常：';

    if(is_object($exception)){
        $msg .= config('app.show_error_msg') == true ? $exception->getMessage() . ' 在文件' . $exception->getFile() . '中第' . $exception->getLine() . '行': $exception->getMessage();
    }else if(is_string($exception)){
        $msg .= $exception;
    }

    return json([
        'data'  => $data,
        'msg'   => $msg,
        'code'  => $code
    ]);
}

/**
 * 获取路由信息
 * @param object $request 请求对象实例
 * @return array
 */
function getRouteInfo($request): array
{
    return [
        'app_name' => strtolower(app()->http->getName()), //应用路由名称
        'controller' => toUnderline($request->controller()), //控制器路由名称
        'action' => $request->action(true), //操作路由名称
    ];
}

/**
 * 下划线转驼峰
 * @param string $str        待转换的字符串
 * @param string $separator  分隔符
 * @return string
 */
function toHump(string $str, string $separator='_'): string
{
    $str = str_replace($separator, ' ', strtolower($str));
    return str_replace(' ','', ucwords($str));
}

/**
 * 驼峰转下划线
 * @param string $str        待转换的字符串
 * @param string $separator  分隔符
 * @return string
 */
function toUnderline(string $str, string $separator='_'): string
{
    return strtolower(trim(preg_replace("/[A-Z]/", $separator . "$0", $str), $separator));
}

/**
 * 生成登录访问令牌: 当天有效
 * @param string $username 用户名
 * @param string $pwd  密码加密后的字符串
 * @param string $ip  当前登录IP地址
 * @return string
 */
function makeToken(string $username, string $pwd , string $ip): string
{
    return  strtolower(md5($username . '_' . $pwd . '_' . $ip . date('Y-m-d') . 'vuecmf'));
}

/**
 * 获取表格的树形列表
 * @param object $model           模型实例
 * @param int $pid                父级ID
 * @param string $keywords        过滤关键词
 * @param string $pid_field       父级字段名
 * @param string $search_field    过滤字段名
 * @param string $order_field     排序字段名
 * @param int $total              总条数
 * @return array
 */
function getTreeList($model, int $pid, string $keywords, string $pid_field = 'pid', string $search_field = 'title', string $order_field = 'sort_num', int &$total = 0): array
{
    $query = $model->where($pid_field, $pid);
    !empty($keywords) && $query->whereLike($search_field, '%'.$keywords.'%');
    !empty($order_field) && $query->order($order_field);
    $res = $query->select()->toArray();
    $total += count($res);
    foreach ($res as &$val){
        $child = getTreeList($model,  $val['id'], $keywords, $pid_field, $search_field, $order_field, $total);
        $val[$pid_field] == 0 && $val[$pid_field] = '';
        !empty($child['data']) && $val['children'] = $child['data'];
    }
    return ['data' => $res, 'total' => $total];
}


/**
 * 格式化下拉树型列表
 * @param array $tree             存储返回的结果
 * @param object $model           模型实例
 * @param int $pid                父级ID
 * @param string $label           标题字段名
 * @param string $pid_field       父级字段名
 * @param string $order_field     排序字段名
 * @param int $level              层级数
 * @return array
 */
function formatTree(array &$tree, $model, int $pid = 0, string $label = 'title', string $pid_field = 'pid', string $order_field = 'sort_num', int $level = 1): array
{
    $index_key = $model->getPk();
    $query = $model->where($pid_field,$pid)
        ->where('status', 10);
    !empty($order_field) && $query->order($order_field);
    $res = $query->column($label, $index_key);

    if(!empty($res)){
        foreach($res as $key => $val){

            $prefix = str_repeat('┊ ',$level-1);

            $keys = array_keys($res);
            $child = $model->where($pid_field, $key)
                ->where('status', 10)
                ->count();

            if($child || $key != end($keys)){
                $prefix .= '┊┈ ';
            }else{
                $prefix .= '└─ ';
            }

            $item = [];
            $item['id'] = $key;
            $item['label'] = $prefix . $val;
            $item['level'] = $level;

            $tree[] = $item;

            formatTree($tree, $model, $key, $label, $pid_field, $order_field,$level + 1);
        }
    }

    return $tree;
}


/**
 * 获取目录树的层级路径
 * @param string $id_path    层级路径
 * @param object $model      模型实例
 * @param int $pid           父级ID
 * @param string $pid_field  父级ID的字段名称
 * @return mixed|string
 */
function getTreeIdPath(string &$id_path, $model, int $pid = 0, string $pid_field = 'pid')
{
    $pid_val = $model->where('id',$pid)->where('status', 10)->value($pid_field);

    $pid_val != 0 && $id_path = $pid_val . ',' . $id_path;

    if($pid_val != 0){
        $id_path = getTreeIdPath($id_path, $model, $pid_val, $pid_field);
    }

    return $id_path;
}
