<?php

namespace LeshuaPay\Requests\Appendix;

use LeshuaPay\Config;
use LeshuaPay\Requests\BaseRequest;
use LeshuaPay\Utils\SignUtil;
use LeshuaPay\Utils\StrUtil;

/**
 * 商户相关接口基类
 * 商户相关不需要返回结果验签
 * Class BaseMerchant
 * @package LeshuaPayment\Requests\Merchant
 */
abstract class BaseAppendix implements BaseRequest
{
    protected $params = [];

    public function packageParams(): array
    {
        $tmp['agentId'] = Config::AGENT_ID;
        $tmp['version'] = Config::API_VERSION;
        $tmp['reqSerialNo'] = StrUtil::getReqSerialNo();
        $tmp['sign'] = SignUtil::merchantSign($this->params);
        $tmp['data'] = json_encode($this->params, JSON_FORCE_OBJECT);
        return $tmp;
    }

    public function getHeaders(): array
    {
        return [
            'Accept:application/json'
//            'Accept:application/x-www-form-urlencoded'
        ];
    }
}
