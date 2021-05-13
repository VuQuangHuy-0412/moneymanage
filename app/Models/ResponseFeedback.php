<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $response_id
 * @property int $feedback_id
 * @property int $user_response_id
 * @property string $content
 */

class ResponseFeedback extends Model
{
    protected $connection = 'mysql';

    protected $table = 'money_manage.response_feedback';

    protected $guarded = [];

    protected $primaryKey = 'response_id';

    public $timestamps = false;
}
