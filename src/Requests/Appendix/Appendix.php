<?php

namespace LeshuaPay\Requests\Appendix;

use LeshuaPay\Config;

/**
 * 附录
 * Class Register
 * @package LeshuaPay\Requests\Appendix
 */
class Appendix extends BaseAppendix
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
        return Config::APPENDIX_API_URL . $this->requestUrl;
    }
}
