<?php


namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;

/**
 * @property int $user_id
 * @property string $user_name
 * @property string $date_of_birth
 * @property int $gender
 * @property int $active_user
 * @property string $email
 */
class UserInformation extends Model implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;
    protected $connection = 'mysql';

    protected $table = 'money_manage.user_information';

    protected $guarded = [];

    protected $primaryKey = 'user_id';

    public $timestamps = false;
}
