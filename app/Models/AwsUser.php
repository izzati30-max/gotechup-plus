<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AwsUser extends Model
{
    protected $connection = 'aws';  // Use AWS database connection
    protected $table = 'Account';
}
