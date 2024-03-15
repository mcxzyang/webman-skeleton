<?php

namespace app\model;

use support\Model;

/**
 * admin_users
 * @property integer $id (主键)
 * @property string $username
 * @property string $name
 * @property string $avatar
 * @property string $password
 * @property integer $is_super_admin
 * @property integer $status
 * @property mixed $created_at
 * @property mixed $updated_at
 */
class AdminUser extends Model
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
    protected $table = 'admin_users';

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
