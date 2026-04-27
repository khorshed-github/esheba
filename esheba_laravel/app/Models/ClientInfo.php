<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientInfo extends Model
{
    use HasFactory;

    protected $table = 'client_info';

    protected $fillable = [
        'company_name',
        'client_name',
        'email',
        'mobile',
        'url',
        'domain',
        'hosting',
        'expire_date',
        'amount',
        'status',
    ];
}
