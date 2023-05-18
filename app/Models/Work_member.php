<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'state',
        'email',
        'name',
        'highlevel',
        'company',
        'companyno',
        'part',
        'partno',
        'gender',
        'profile_type',
        'profile_img_idx',
        'live_1',
        'live_2',
        'live_3',
        'live_4',
        'grade',
        'coin',
        'comcoin',
        'birthday',
        'addr1',
        'addr2',
        'zipcode',
        'phone',
        'ip',
        'memo',
        'login_count',
        'live_1_regdate',
        'live_2_regdate',
        'live_3_regdate',
        'live_4_regdate',
        'login_date',
        'editdate',
        'regdate',
        'send_main_cnt',
        'sender_mail',
        'sender_name',
        'send_main_cnt',
        'receive_email',
        'receive_name',
        'sender_ip',
        'receive_ip',
        'mail_chk_date',
        'mail_send_regdate',
        't_flag',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
