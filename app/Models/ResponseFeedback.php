<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResponseFeedback extends Model
{
    protected $connection = 'mysql';

    protected $table = 'money_manage.response_feedback';

    protected $guarded = [];

    protected $primaryKey = 'response_id';

    public $timestamps = true;
}
