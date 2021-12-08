<?php

namespace LeshuaPay\Requests\ShareMerchant;

use LeshuaPay\Config;
use LeshuaPay\Requests\BaseRequest;
use LeshuaPay\Utils\SignUtil;
use LeshuaPay\Utils\StrUtil;

/**
 * 分账相关接口基类
 * 分账相关不需要返回结果验签
 * Class BaseMerchant
 * @package LeshuaPayment\Requests\ShareMerchant
 */
abstract class BaseShare implements BaseRequest
{
    protected $params = [];

    public function packageParams(): array
    {
        $tmp['agentId'] = Config::AGENT_ID;
        $tmp['version'] = Config::API_VERSION;
        $tmp['reqSerialNo'] = StrUtil::getReqSerialNo();
        if (!empty($this->params['media'])){
            $tmp['media'] = $this->params['media'];
            unset($this->params['media']);
        }
        $tmp['sign'] = SignUtil::merchantSign($this->params);
        $tmp['data'] = json_encode($this->params, JSON_FORCE_OBJECT);
        return $tmp;
    }

    public function getHeaders(): array
    {
        return [
            'Accept:application/json'
        ];
    }
}
