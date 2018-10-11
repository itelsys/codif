<?php

namespace App;

use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','type', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    const ADMIN_TYPE = 'admin';
    const SUPADMIN_TYPE = 'Chef_projet';
    const DEFAULT_TYPE = 'utilisateur';

    public function isAdmine(){  

        return $this->type === self::ADMIN_TYPE;    
    }
    public function isSupAdmine(){  

        return $this->type === self::SUPADMIN_TYPE;  
    }

    function isAdmin() {
        $admin_emails = ['john_doe@example.com'];
        if(in_array($this->email, $admin_emails)){
            return true;
        }else{
            return false;
        } 
    }
}
