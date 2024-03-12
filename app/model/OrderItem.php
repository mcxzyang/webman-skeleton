<?php

namespace app\model;

use support\Model;

/**
 * order_items 
 * @property integer $id (主键)
 * @property integer $order_id 
 * @property integer $product_id 
 * @property integer $product_sku_id 
 * @property string $price 单价
 * @property integer $stock 数量
 * @property string $total 小计
 * @property string $express_no 快递单号
 * @property string $express_company_name 快递公司
 * @property mixed $delivery_time 
 * @property mixed $receiving_time 
 * @property mixed $apply_refund_at 申请退款时间
 * @property integer $status 
 * @property integer $after_status 1-审核中 2-退款中 3-退货中 4-退款成功 5-退款失败 6-审核不通过 7-评审中 8-退货完成，拒绝退款 9-已关闭 10-审核通过
 * @property mixed $created_at 
 * @property mixed $updated_at
 */
class OrderItem extends Model
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
    protected $table = 'order_items';

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
    
    
}
