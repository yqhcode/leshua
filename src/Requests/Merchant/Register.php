<?php

namespace LeshuaPay\Requests\Merchant;

use LeshuaPay\Config;

/**
 * 商户入驻--上传商户资料，生成乐刷商户号
 * Class Register
 * @package LeshuaPay\Requests\Merchant
 */
class Register extends BaseMerchant
{
    private $requestUrl;  //

    public function __construct(array $params)
    {
        $this->params = $params;
    }

    /**
     * @param string $url
     * @return $this
     */
    public function setUrl(string $url):self
    {
        $this->requestUrl = $url;
        return $this;
    }

    /**  请求URL
     * @return string
     */
    public function getUrl(): string
    {
        return Config::MCH_API_URL . $this->requestUrl;
    }
}
