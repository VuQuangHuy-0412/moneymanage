<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserCategory extends Model
{
    protected $connection = 'mysql';

    protected $table = 'money_manage.user_category';

    protected $guarded = [];

    protected $primaryKey = 'user_category_id';

    public $timestamps = true;
}
