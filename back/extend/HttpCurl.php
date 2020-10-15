<?php

/**
 * HttpCurl 类库
 * @package Mobile\Libraries
 */
class HttpCurl
{
    /**
     * 模拟POST与GET请求
     *
     * Examples:
     * ```
     * HttpCurl::request('http://example.com/', 'post', array(
     *  'user_uid' => 'root',
     *  'user_pwd' => '123456'
     * ));
     *
     * HttpCurl::request('http://example.com/', 'post', '{"name": "peter"}');
     *
     * HttpCurl::request('http://example.com/', 'post', array(
     *  'file1' => '@/data/sky.jpg',
     *  'file2' => '@/data/bird.jpg'
     * ));
     *
     * // windows
     * HttpCurl::request('http://example.com/', 'post', array(
     *  'file1' => '@G:\wamp\www\data\1.jpg',
     *  'file2' => '@G:\wamp\www\data\2.jpg'
     * ));
     *
     * HttpCurl::request('http://example.com/', 'get');
     *
     * HttpCurl::request('http://example.com/?a=123', 'get', array('b'=>456));
     * ```
     *
     * @param string $url [请求地址]
     * @param string $type [请求方式 post or get]
     * @param bool|string|array $data [传递的参数]
     * @param array $header [可选：请求头] eg: ['Content-Type:application/json']
     * @param boolean $gzip [可选：GZIP压缩]
     * @param boolean $redirect [可选：重定向跳转]
     * @param int $timeout [可选：超时时间]
     *
     * @return array($body, $header, $status, $errno, $error)
     * - $body string [响应正文]
     * - $header string [响应头]
     * - $status array [响应状态]
     * - $errno int [错误码]
     * - $error string [错误描述]
     */
    public static function request($url, $type, $data = false, $header = [], $gzip = false, $redirect = false, $timeout = 0)
    {
        $cl = curl_init();

        // 兼容HTTPS
        if (stripos($url, 'https://') !== FALSE) {
            curl_setopt($cl, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($cl, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($cl, CURLOPT_SSLVERSION, 1);
        }

        // GZIP压缩
        if($gzip){
            curl_setopt($cl, CURLOPT_ENCODING, "gzip");
        }

        // 允许请求跳转
        if($redirect){
            curl_setopt($cl, CURLOPT_FOLLOWLOCATION, TRUE);
        }

        // 设置返回内容做变量存储
        curl_setopt($cl, CURLOPT_RETURNTRANSFER, 1);

        // 设置需要返回Header
        curl_setopt($cl, CURLOPT_HEADER, true);

        // 设置请求头
        if (count($header) > 0) {
            curl_setopt($cl, CURLOPT_HTTPHEADER, $header);
        }

        // 设置需要返回Body
        curl_setopt($cl, CURLOPT_NOBODY, 0);

        // 设置超时时间
        if ($timeout > 0) {
            curl_setopt($cl, CURLOPT_TIMEOUT, $timeout);
        }

        // POST/GET参数处理
        $type = strtoupper($type);
            if ($type == 'POST') {
            curl_setopt($cl, CURLOPT_POST, true);
            // convert @ prefixed file names to CurlFile class
            // since @ prefix is deprecated as of PHP 5.6
            if (class_exists('\CURLFile') && is_array($data)) {
                foreach ($data as $k => $v) {
                    if (is_string($v) && strpos($v, '@') === 0) {
                        $v = ltrim($v, '@');
                        $data[$k] = new \CURLFile($v);
                    }
                }
            }
            
            curl_setopt($cl, CURLOPT_POSTFIELDS, $data);
        }
        if ($type == 'GET' && is_array($data)) {
            if (stripos($url, "?") === FALSE) {
                $url .= '?';
            }
            $url .= http_build_query($data);
        }
        if ($type == 'DELETE') {
            curl_setopt($cl, CURLOPT_CUSTOMREQUEST, 'DELETE');
        }
        if ($type == 'PUT') {
            curl_setopt($cl, CURLOPT_CUSTOMREQUEST, 'PUT');
            curl_setopt($cl, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($cl, CURLOPT_URL, $url);
        // 读取获取内容
        $response = curl_exec($cl);
        // 读取状态
        $status = curl_getinfo($cl);
        // 读取错误号
        $errno  = curl_errno($cl);
        // 读取错误详情
        $error = curl_error($cl);
        //http code
        $code = curl_getinfo($cl,CURLINFO_HTTP_CODE);
        // 关闭Curl
        curl_close($cl);
        if ($errno == 0 && isset($status['http_code'])) {
            $header = substr($response, 0, $status['header_size']);
            $body = substr($response, $status['header_size']);
            return array($code,$body, $header, $status, 0, '');
        } else {
            return array('', '', $status, $errno, $error);
        }
    }
}
