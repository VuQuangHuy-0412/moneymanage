<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $admin_id
 * @property int $user_id
 * @property string $name
 * @property string $email
 * @property int $created_by
 * @property string $updated_by
 */

class Admin extends Model
{
    protected $connection = 'mysql';

    protected $table = 'money_manage.admin';

    protected $guarded = [];

    protected $primaryKey = 'admin_id';

    public $timestamps = false;
}
