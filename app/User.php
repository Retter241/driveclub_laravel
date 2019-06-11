<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use App\Post as Post;

/*
use Rennokki\Befriended\Traits\Follow;
use Rennokki\Befriended\Contracts\Following;*/
//canFollow
use Rennokki\Befriended\Traits\CanFollow;
use Rennokki\Befriended\Contracts\Follower;

//canBeFollowed
use Rennokki\Befriended\Traits\CanBeFollowed;
use Rennokki\Befriended\Contracts\Followable;

use Rennokki\Befriended\Scopes\FollowFilterable;

//use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
//use Spatie\MediaLibrary\HasMedia\HasMedia;
//use Spatie\MediaLibrary\Models\Media;

class User extends Authenticatable implements  Follower ,Followable /*implements HasMedia*/
{
    use Notifiable;
    use HasRoles;

 //use Follow;
    use CanFollow;
    use CanBeFollowed;
    use FollowFilterable;

    //use HasMediaTrait;

    protected $guard_name = 'web'; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'level','img', 'about' 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','sudo',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

   /* public function registerMediaConversions(Media $media = null)
  {
    $this->addMediaConversion('thumb')
      ->width(50)
      ->height(50);
  }*/


   /* public function hasRole($roleName)
    {
        return $this->role == $roleName; // sample implementation only
    }*/


    //Define Polymorphic Relationships


    /*public function is_follow($id)
    {
        $guardName = $guardName ?? Guard::getDefaultName(static::class);
        $permission = static::getPermissions(['id' => $id, 'guard_name' => $guardName])->first();

        if (! $permission) {
            throw PermissionDoesNotExist::withId($id, $guardName);
        }

        return $permission;

        return $this->belongsTo(User::class , 'author');
    }*/
    public function projects()
    {
        return $this->hasMany(Project::class , 'author');
    }
}
