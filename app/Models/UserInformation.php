<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserInformation extends Model
{
    protected $connection = 'mysql';

    protected $table = 'money_manage.user_information';

    protected $guarded = [];

    protected $primaryKey = 'user_id';

    public $timestamps = false;
}
