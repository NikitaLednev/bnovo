<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Guest model class
 *
 * @property int $id
 * @property int $firstname
 * @property int $lastname
 * @property int $email
 * @property int $phone
 * @property int $country
 */
class Guest extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname','lastname', 'email', 'phone', 'country',
    ];

    /**
     * Remove default timestaps
     *
     * @var bool
     */
    public $timestamps = false;
}
