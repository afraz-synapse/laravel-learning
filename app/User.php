<?php

namespace App;

use app\Helpers\CommonFunction;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function updateRecord($data,$file){
        
        $fileName = null;

        if($file){
            $fileName = "images/profile-".$this->id.'.'.$file->getClientOriginalExtension();
            // $fileName = CommonFunction::fileUpload($file,$fileName);
            $flag = $file->storeAs(
                'public',
                $fileName
            );
        }

        $this->image = $fileName ?? $this->image;
        $this->name = $data['name'];
        $this->email = $data['email'];
        if($data['password'])
            $this->password = bcrypt($data['password']);

        return $this->save();
    }
}
