<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUsInformation extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_name',
        'company_web',
        'company_email',
        'company_email_1',
        'company_office_time',
        'company_header',
        'company_description',
        'company_address_1',
        'company_address_2',
        'company_mobile_1',
        'company_mobile_2',
        'company_telephone',
        'company_facebook',
        'company_twitter',
        'company_linkedin',
        'company_telegram',
        'company_whatsapp',
        'company_youtube',
        'update_by',
        'user_id',
    ];
}
