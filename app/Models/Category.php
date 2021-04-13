<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $connection = 'mysql';

    protected $table = 'money_manage.category';

    protected $guarded = [];

    protected $primaryKey = 'category_id';

    public $timestamps = false;
}
