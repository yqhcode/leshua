# Leshua Pay
乐刷聚合支付 PHP SDK


## 文件目录
```
src/
  - Exceptions/ 异常类
  - Requests/
            - Appendix/ 数据服务
                      - Appendix.php 数据服务类：MccCode、地区、支行信息查询
                      - BaseAppendix.php 抽象数据服务类
            - Merchant/ 商户进件及配置相关
                      - BaseMerchant.php 抽象商户进件类
                      - Pictrue.php 文件上传请求类
                      - Register.php 商户进件类
            - Transaction/ 交易相关请求
                      - BasePay.php 抽象支付请求类，把两个支付接口共有的参数设置都放在这里
                      - CloseOrder.php 关闭订单请求类
                      - GetWxPayFaceAuthInfo.php 获取微信刷脸凭证
                      - QRPay.php 条码支付
                      - QueryRefund.php 退款查询
                      - QueryStatus.php 交易结果查询
                      - QueryUPUserId.php 银联云闪付，授权码获取用户ID
                      - QueryWXOpenId.php 微信，授权码查询用户openid
                      - Refund.php 退款
                      - UnifiedOrder.php 统一订单
            - BaseRequest.php 基础请求接口
            - Utils/ 工具类相关
                  - SignUtil.php 签名工具类，签名、验证相关具体逻辑都放在这里
                  - StrUtil.php 字符工具类，随机字符、请求流水号、xml 转 array
  - Config.php 配置类，需要灵活配置的参数相关
  - LeshuaClient.php SDK 客户端类，充当本 SDK 的客户端，把各请求类定义好的 URL 、参数、特殊 header 设置，组装发送出去，并返回结果

```

