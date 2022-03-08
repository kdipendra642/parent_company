<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSettings extends Model
{
    protected $fillable = [
        'site_name',
        'site_title',
        'site_description',
        'meta_title',
        'social_profile_fb',
        'social_profile_twitter',
        'social_profile_insta',
        'social_profile_youtube',
        'social_profile_linkedin',
        'contact_title',
        'contact_phone',
        'contact_phone2',
        'contact_email',
        'contact_email2',
        'address_title',
        'address_1',
        'address_2',
        'about_title',
        'about_sub_title',
        'about_description',
        'about_image',
        'logo',
        'favicon',
    ];
}
