<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\UpdatedEmailNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new UpdatedEmailNotification($token));
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'status',
        'image',
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


    public function doctor()
    {
        return $this->hasOne(Doctor::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

    public function adminlte_profile_url()
    {
        return "/profile";
    }

    public function adminlte_image()
    {
        $userImage = \Auth::user()->image;

        if ($userImage) {
            // Check if the image URL starts with 'https://'
            if (strpos($userImage, 'https://') === 0) {
                // If it starts with 'https://', return the URL directly
                return $userImage;
            } else {
                // Otherwise, use the default public path
                return asset('uploads/images/profile/' . $userImage);
            }
        } else {
            // Default image if no user image is set
            return asset('vendor/adminlte/dist/img/gravtar.jpg');
        }
    }

    public function profileImage()
    {
        $userImage = $this->image;

        if (!empty($userImage)) {
            return asset('uploads/images/profile/' . $userImage);
        } else {
            return asset('vendor/adminlte/dist/img/gravtar.jpg');
        }
    }

    //frontend user image for booking
    public function doctorImage()
    {
        $userImage = $this->image;

        if (!empty($userImage)) {
            return asset('uploads/images/profile/' . $userImage);
        } else {
            return asset('vendor/adminlte/dist/img/gravtar.jpg');
        }
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

}