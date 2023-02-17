<?php

namespace App\Models;

use App\Jobs\CreateFileJob;
use App\Jobs\SaveNumFromFileJob;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class JobReadFile extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasFactory;

    protected $table = 'job_guid_generate_results';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'job_guid_generate_uuid',
        'result'
    ];



    public static function boot()
    {
        parent::boot();

        self::created(
            function ($job) {
                $save = new SaveNumFromFileJob($job->job_guid_generate_uuid);
                dispatch($save);
            }
        );
    }

}
