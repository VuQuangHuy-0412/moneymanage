<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * @property int $category_id
 * @property string $name
 * @property int $type
 */

class Category extends Model
{
    protected $connection = 'mysql';

    protected $table = 'money_manage.category';

    protected $guarded = [];

    protected $primaryKey = 'category_id';

    public $timestamps = false;

    public function get_name_by_id($category_id) {
        $query = DB::table('category')
            ->where('category_id', $category_id)
            ->first();

        return $query;
    }
}
