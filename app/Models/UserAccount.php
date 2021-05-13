<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $user_id
 * @property int $user_account_id
 * @property string $user_account
 * @property string $email
 * @property string $user_password
 */

class UserAccount extends Model
{
    protected $connection = 'mysql';

    protected $table = 'money_manage.user_account';

    protected $guarded = [];

    protected $primaryKey = 'user_account_id';

    public $timestamps = false;
}
