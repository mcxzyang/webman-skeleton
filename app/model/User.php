<?php

namespace app\model;

use support\Model;

/**
 * users 
 * @property integer $id (主键)
 * @property integer $company_id 
 * @property string $third_party_user_id 第三方UserId
 * @property string $name 
 * @property string $nickname 昵称
 * @property string $avatar 头像
 * @property string $phone 手机号
 * @property string $point 
 * @property integer $lottery_number 抽奖次数
 * @property string $mini_program_openid 小程序 openid
 * @property integer $status 状态 1-正常 0-已禁用
 * @property string $remember_token 
 * @property mixed $created_at 
 * @property mixed $updated_at
 */
class User extends Model
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
    protected $table = 'users';

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
