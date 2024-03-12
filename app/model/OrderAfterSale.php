<?php

namespace app\model;

use support\Model;

/**
 * order_after_sales 
 * @property integer $id (主键)
 * @property string $no 
 * @property integer $user_id 
 * @property integer $order_id 
 * @property integer $order_item_id 
 * @property integer $type 1-仅退款 2-退货退款
 * @property string $price 退款金额
 * @property string $reason 
 * @property string $review_remark 审核备注
 * @property integer $after_status 1-审核中 2-退款中 3-退货中 4-退款成功 5-退款失败 6-审核不通过 7-评审中 8-退货完成，拒绝退款 9-已关闭 10-审核通过
 * @property mixed $created_at 
 * @property mixed $updated_at
 */
class OrderAfterSale extends Model
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
    protected $table = 'order_after_sales';

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
