<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Thread;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'User_ID';
    protected $username = 'Username';
    protected $password = 'Password';
    protected $email = 'Email';
    protected $user_type = 'User_Type';
    public $incrementing = true;
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'password',
        'email',
        'user_type'
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

    public function admin()
    {
        return $this->hasOne(Admin::class, 'User_ID', 'User_ID');
    }



    public function customer() {
        return $this->hasOne(Customer::class, 'User_ID', 'User_ID');
    }

    // Laravel provides default implementation for common columns like email, password, and remember_token in users. 
    // Since we are using non-default column names for email and password, these three functions override some methods 
    // in the User model.
    public function getAuthPassword(){
        return $this->Password;
    }

    public function getAuthIdentifierName(){
        return 'User_ID';
    }

    public function getAuthIdentifier(){
        return $this->{$this->getAuthIdentifierName()};
    }

    public function orders() {
        return $this->hasMany(Orders::class, 'User_ID');
    }

    public function comments(){
        return $this->hasMany(Comment::class, 'user_id', 'User_ID');
    }

}
