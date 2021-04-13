<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserFeedback extends Model
{
    protected $connection = 'mysql';

    protected $table = 'money_manage.user_feedback';

    protected $guarded = [];

    protected $primaryKey = 'feedback_id';

    public $timestamps = false;
}
