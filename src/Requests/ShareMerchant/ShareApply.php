<?php
namespace LeshuaPay\Requests\ShareMerchant;

use LeshuaPay\Config;
use LeshuaPay\Requests\BaseRequest;
use LeshuaPay\Requests\Merchant\Register;
use LeshuaPay\Utils\SignUtil;
use LeshuaPay\Utils\StrUtil;

/**
 * 1.7分账授权申请-电子合同版
 * Class ShareApply
 */
class ShareApply extends BaseShare
{
    /**
     * @var string
     */
    protected $requestUrl;

    /**
     * ShareApply constructor.
     * @param array $params
     */
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

    /** 请求URL
     * @return string
     */
    public function getUrl(): string
    {
        return Config::APPENDIX_API_URL . $this->requestUrl;
    }


}
