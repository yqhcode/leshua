<?php

namespace LeshuaPay;

/**
 * Class Config
 * @package LeshuaPay
 */
class Config
{
    /**
     * TODO
     * 代理商 ID
     * 在进件相关会用到
     */
//    const AGENT_ID = '10';  //测试
    const AGENT_ID = '3206155';  //正式

    /**
     * 接口版本号
     * 目前为固定
     */
    const API_VERSION = '2.0';

    /**
     * TODO
     * 渠道商固定key值
     */
//    const KEY_AGENT = '17B10781A8C5178870197906F71749D8'; //测试
    const KEY_AGENT = '96B3DADB0F6E4591AEC3C87FDE326D08'; //正式

    /**
     * TODO
     * 商户密钥，交易相关的签名秘钥
     */
//    const KEY_TRANSACTION = 'a1613a0e7cb9d3a51e33784ee4d212ac'; //测试
    const KEY_TRANSACTION = '96B3DADB0F6E4591AEC3C87FDE326D08'; //正式
//    const KEY_TRANSACTION = '133A71DA6AA846C0BDC318DB63E8CE94'; //正式

    /**
     * 交易相关接口
     * 生产环境
     */
//    const PAYMENT_API_URL = 'https://t-paygate.lepass.cn/cgi-bin/lepos_pay_gateway.cgi';  //测试
    const PAYMENT_API_URL = 'https://paygate.leshuazf.com/cgi-bin/lepos_pay_gateway.cgi'; //正式

    /**
     * 商户进件环境域名
     * 测试环境域名：http://t-saas-mch.lepass.cn/apiv2
     * 生产环境域名：https://saas-mch.leshuazf.com/apiv2
     */
//    const MCH_API_URL = 'http://t-saas-mch.lepass.cn/apiv2';  //测试
    const MCH_API_URL = 'https://saas-mch.leshuazf.com/apiv2'; //正式
    /**
     * 附录+分账域名
     * 测试环境域名：http://t-saas-mch.lepass.cn
     * 生产环境域名：https://saas-mch.leshuazf.com
     */
//    const APPENDIX_API_URL = 'http://t-saas-mch.lepass.cn';  //测试
    const APPENDIX_API_URL = 'https://saas-mch.leshuazf.com'; //正式
    /**
     * 商户进件URL
     */
    const MERCHANT_REGISTER = '/merchant/register';  //商户入驻
    const MERCHANT_OPEN = '/merchant/open';  //商户设置费率
    const MERCHANT_UPDATE = '/merchant/update';  //商户信息修改
    const MERCHANT_AUDIT_QRY = '/merchant/audit_qry';  //商户审核查询
    const MERCHANT_FEE_QRY = '/merchant/fee_qry';  //商户费率查询
    const MERCHANT_INFO_QRY = '/merchant/info_qry';  //商户信息查询
    const WECHAT_WXPAYCONFIG = '/wechat/wxpayconfig';  //商户微信支付参数配置
    const WECHAT_WXPAYCONFIG_QRY = '/wechat/wxpayconfig_qry';  //商户微信支付参数查询
    const MERCHANT_UPDATE_SHORT_NAME = '/merchant/merchantUpdateShortname';  //微信子商户简称更新
    const SUBMCH_SYNC_ZFB_MSG = '/submch/syncZfbMsg';  //支付宝子商户更新
    const SUBMCH_QUERY = '/submch/query';  //微信/支付宝/银联子商户号查询
    const WECHAT_SUBJECT_APPLY = '/wechat/subject/apply';  //微信/支付宝/银联子商户号查询
    const WECHAT_SUBJECT_CANCEL = '/wechat/subject/cancel';  //微信子商户实名认证-撤销
    const WECHAT_SUBJECT_QUERY = '/wechat/subject/query';  //微信子商户实名认证-查询
    const GET_AUTHORIZE_STATE_BY_WXMERID = '/submch/getauthorizestateByWxMerId';  //微信授权状态查询接口
    const CHECK_WXTRADE_PERMISSION = '/merchant/checkWxTradePermission';  //微信支付权限查询
    const MCC_CODE = '/data/mcc';  //MccCode查询接口
    const LESHUA_AREA = '/data/area';  //地区信息查询接口
    const LESHUA_BANK_BRANCH = '/data/bankbranch2';  //地区信息查询接口


    /**
     * 支付方式
     */
    const PAY_WAY = [
        1 => 'WXZF',  //微信
        2 => 'ZFBZF',  //支付宝
        3 => 'UPSMZF'  //银联二维码
    ];

    /**
     * 分账url
     */
    const ELEC_CONTRACT_ACCREDIT = '/api/share-merchant/elec-contract-accredit';  //1.7分账授权申请-电子合同版
    const ACCREDIT_QUERY = '/api/share-merchant/accreditQuery';  //1.8分账授权结果查询
    const SHARE_MERCHANT_BIND = '/api/share-merchant/bind';  //1.9分账方关联
    const SHARE_MERCHANT_UNBIND = '/api/share-merchant/unbind';  //2.0分账方解除关联
    const SHARE_MERCHANT_QUERYBIND = '/api/share-merchant/queryBind';  //2.1分账方关联查询接口
    const SHARE_MERCHANT_QUERY = '/api/share-merchant/query';  //2.4分账查询
    const SHARE_MERCHANT_REFUND = '/api/share-merchant/refund';  //2.5分账退款
    const SHARE_MERCHANT_REFUNDQUERY = '/api/share-merchant/refundQuery';  //2.6分账退款查询
    const SHARE_MERCHANT_MULTI_APPLY = '/api/share-merchant/multi-apply';  //2.7分账确认-多次分账
    const SHARE_MERCHANT_MULTI_QUERY = '/api/share-merchant/multi-query';  //2.8多次分账-查询
    const SHARE_MERCHANT_CANCEL = '/api/share-merchant/cancel';  //2.9分账撤销

}
