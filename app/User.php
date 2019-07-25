<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class User extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $fillable = [
        'id', 'email', 'full_name','company_name','phone_number','content'
    ];




}
