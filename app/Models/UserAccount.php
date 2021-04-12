<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAccount extends Model
{
    protected $connection = 'mysql';

    protected $table = 'money_manage.user_account';

    protected $guarded = [];

    protected $primaryKey = 'user_account_id';

    public $timestamps = false;
}
