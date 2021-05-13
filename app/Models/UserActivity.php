<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $activity_id
 * @property int $user_id
 * @property int $category_id
 * @property int $money_amount
 * @property string $describe
 */

class UserActivity extends Model
{
    protected $connection = 'mysql';

    protected $table = 'money_manage.user_activity';

    protected $guarded = [];

    protected $primaryKey = 'activity_id';

    public $timestamps = false;
}
