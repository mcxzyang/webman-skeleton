<?php

namespace app\model;

use support\Model;

/**
 * orders 
 * @property integer $id (主键)
 * @property integer $user_id 
 * @property integer $company_id 
 * @property integer $type 1-普通订单 2-团购订单
 * @property string $order_no 
 * @property string $trade_order_no 第三方订单号
 * @property string $prepay_id 
 * @property mixed $prepay_id_exp_at 
 * @property integer $pay_type 支付方式 1-微信 2-支付宝 3-积分
 * @property string $total 优惠后的总价
 * @property string $original_total 原总价
 * @property string $freight_amount 运费
 * @property mixed $pay_at 支付时间
 * @property integer $user_address_id 
 * @property string $address 
 * @property string $discount_info 优惠信息
 * @property string $chit_record_info 代金券信息
 * @property mixed $delivery_time 发货时间
 * @property mixed $receiving_time 收货时间
 * @property integer $lottery_number 赠送的抽奖次数
 * @property string $lottery_order_condition_info 
 * @property string $remark 
 * @property integer $status 1-待付款 2-待发货 3-待收货 4-已完成 5-已取消
 * @property integer $after_status 1-审核中 2-退款中 3-退货中 4-退款成功 5-退款失败 6-审核不通过 7-评审中 8-退货完成，拒绝退款 9-已关闭 10-审核通过
 * @property integer $is_deleted 
 * @property mixed $created_at 
 * @property mixed $updated_at
 */
class Order extends Model
{
    /**
     * The connection name for the model.
     *
     * @var string|null
     */
    protected $connection = 'mysql';
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'orders';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    protected $casts = [
        'address' => 'json'
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function orderAfterSales()
    {
        return $this->hasMany(OrderAfterSale::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
