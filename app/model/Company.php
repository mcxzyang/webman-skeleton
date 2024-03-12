<?php

namespace app\model;

use support\Model;

/**
 * companies 
 * @property integer $id (主键)
 * @property string $name 
 * @property string $link_name 
 * @property string $link_phone 
 * @property mixed $key 
 * @property string $client_id 
 * @property string $client_secret 
 * @property string $username 
 * @property string $password 
 * @property string $mini_program_app_id 
 * @property string $mini_program_app_secret 
 * @property string $wechat_pay_app_id 
 * @property string $wechat_pay_app_mchid 
 * @property string $wechat_pay_key 
 * @property string $apiclient_cert_path 
 * @property string $apiclient_key_path 
 * @property integer $status 
 * @property mixed $created_at 
 * @property mixed $updated_at
 */
class Company extends Model
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
    protected $table = 'companies';

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
