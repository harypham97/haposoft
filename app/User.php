<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $dates = ['deleted_at'];
    protected $fillable = ['id', 'email', 'full_name', 'company_name', 'phone_number', 'content', 'avatar'];


}
