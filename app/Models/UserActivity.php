<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{
    protected $connection = 'mysql';

    protected $table = 'money_manage.user_activity';

    protected $guarded = [];

    protected $primaryKey = 'activity_id';

    public $timestamps = false;
}
