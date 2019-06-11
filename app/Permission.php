<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


//http://www.expertphp.in/article/laravel-5-4-user-role-and-permissions-with-spatie-laravel-permission
class Permission extends \Spatie\Permission\Models\Permission
{
    //
    public static function defaultPermissions()
    {
        return [ 
        	'super-user',         
            'viewPost',
            'addPost',
            'editPost',
            'deletePost',
        ];
    }
}
