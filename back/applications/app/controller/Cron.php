<?php
namespace app\app\controller;

use think\Db;
use think\Controller;
class Cron extends Controller
{
    public function _initialize()
    {
        require_once EXTEND_PATH . 'HttpCurl.php';
    }
    public function index()
    {
        return json_encode('欢迎访问！', JSON_UNESCAPED_UNICODE);
    }
    public function platformsAndAnchors()
    {
        $xzv_1 = 'https://api.ppjfu.com/v1_0_1/platform/getPlatfromsAndAnchors';
        $xzv_0 = 'POST';
        $xzv_5 = \HttpCurl::request($xzv_1, $xzv_0, []);
        if ($xzv_5[0] != 200) {
            return '请求失败!';
        }
        $xzv_8 = json_decode($xzv_5[1], true);
        if (!isset($xzv_8['result']) || !is_array($xzv_8['result'])) {
            return $xzv_8['message'];
        }
        foreach ($xzv_8['result'] as $xzv_2 => &$xzv_6) {
            $xzv_6['created_at'] = time();
            $xzv_6['updated_at'] = time();
        }
        if (Db::table('ap_platforms_and_anchors')->insertAll($xzv_8['result'])) {
            return '获取成功';
        } else {
            return '获取失败';
        }
    }
    public function platforms()
    {
        $xzv_4 = time();
        $xzv_7 = Db::query("SELECT `name`,`key`,logo,nums FROM ap_platforms_and_anchors  WHERE ({$xzv_4} - created_at) < 24 * 3600 ORDER BY created_at DESC LIMIT 0,15");
        return json_encode($xzv_7);
    }
    public function anchors()
    {
        $xzv_9 = input('platform');
        $xzv_3 = Db::query("SELECT anchors FROM ap_platforms_and_anchors WHERE `key` = '{$xzv_9}' ORDER BY created_at DESC LIMIT 0,1");
        return $xzv_3[0]['anchors'];
    }
}