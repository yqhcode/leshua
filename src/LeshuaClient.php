<?php

namespace LeshuaPay;

use LeshuaPay\Requests\BaseRequest;
use LeshuaPay\Exceptions\BadRequestException;
use LeshuaPay\Exceptions\VerifyFailureException;
use LeshuaPay\Utils\StrUtil;
use think\facade\Log;

/**
 * Class LeshuaClient
 * @package LeshuaPayment
 */
class LeshuaClient
{
    /** 发送请求
     * @param BaseRequest $request
     * @return bool|false|mixed|string
     * @throws BadRequestException
     * @throws VerifyFailureException
     */
    public function send(BaseRequest $request)
    {
        $url = $request->getUrl();  //url
        $data = $request->packageParams();  //获取参数
        $headers = $request->getHeaders();  //获取头部信息
//        var_dump($url, $data, $headers);die();

        Log::info('推送乐刷参数信息:' . json_encode($data));
        $response = $this->post($url, $data, $headers);

        if ($response === false) {
            throw new BadRequestException('请求异常');
        }
        if (!empty($headers[0])){
            switch ($headers[0]){
                case 'Accept:text/xml':
                    $response = StrUtil::xml2Array($response);
                    break;
                case 'Accept:text/json':
                    $response = json_decode($response, true);
                    break;
            }
        }
//        if (isset($headers['Accept'])) {
//            if (strpos($headers['Accept'], 'xml') !== false) {
//                var_dump($response);
//                $response = StrUtil::xml2Array($response);
//                var_dump($response);
//            }
//            if (strpos($headers['Accept'], 'json') !== false) {
//                $response = json_encode($response, true);
//            }
//        }
//        if (!is_array($response)) {
//            return $response;
//        }
//        if (method_exists($request, 'verify')
//            && !empty($response['sign'])
//            && $request->verify($response) === false
//        ) {
//            throw new VerifyFailureException('验签失败');
//        }
//        var_dump($response);die();
        return $response;
    }

    /** 提交post请求
     * @param string $url
     * @param array $fields
     * @param array $headers
     * @param int $timeout
     * @return bool|mixed
     */
    private function post(string $url, array $fields, array $headers = [], int $timeout = 10)
    {
        $ch = curl_init();
        if (!isset($headers[0])) {
            array_walk($headers, function (&$v, $k) {
                $v = "{$k}:{$v}";
            });
            $headers = array_values($headers);
        }
        array_push($headers, "Expect:");
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        $resp = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($httpCode != 200) {
            return false;
        }
        return $resp;
    }
}
