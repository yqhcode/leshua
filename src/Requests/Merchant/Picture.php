<?php

namespace LeshuaPay\Requests\Merchant;

use LeshuaPay\Config;

/**
 * 图片上传
 * Class Picture
 * @package LeshuaPayment\Requests\Merchant
 */
class Picture extends BaseMerchant
{
    /** 设置文件参数
     * @param string $path
     * @return $this
     */
    public function setFilePath(string $path)
    {

        $path = str_replace('\\', '/', app()->getRootPath()) . 'public' . $path;
        if (file_exists($path)) {
            $this->params['media'] = new \CURLFile($path);   // php5.5以上只能通过CURLFile上传文件，不能用@+绝对路径上传
            $this->params['fileMD5'] = md5_file($path);
        }
        return $this;
    }

    /**  请求URL
     * @return string
     */
    public function getUrl(): string
    {
        return Config::MCH_API_URL . '/picture/upload';
    }

    /** 获取请求头
     * @return string[]
     */
    public function getHeaders(): array
    {
        return [
//            'Content-Type' => 'multipart/form-data;charset=UTF-8',
//            'Accept' => 'application/json'
        ];
    }
}
