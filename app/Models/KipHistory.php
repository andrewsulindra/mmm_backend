<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Laravel\Passport\HasApiTokens;
// use App\Traits\Uuid;
use App\Models\User;

class KipHistory extends BaseModel
{
    use LogsActivity, HasApiTokens;

    protected $primaryKey = 'id';
    // protected $keyType = 'string';

    protected $table = 'kip_history';

    protected $fillable = [
        'value'
    ];
}
