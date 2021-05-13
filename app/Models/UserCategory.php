<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $user_category_id
 * @property int $user_id
 * @property int $category_id
 * @property string $describe
 */

class UserCategory extends Model
{
    protected $connection = 'mysql';

    protected $table = 'money_manage.user_category';

    protected $guarded = [];

    protected $primaryKey = 'user_category_id';

    public $timestamps = false;
}
