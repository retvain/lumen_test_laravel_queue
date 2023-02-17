<?php

namespace App\Models;

use App\Jobs\CreateFileJob;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class JobGuidGenerate extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasFactory;

    protected $table = 'job_guid_generate';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'guid_uuid',
    ];

    public static function boot()
    {
        parent::boot();

        self::created(
            function ($job) {
                $createFileJob = new CreateFileJob($job->guid_uuid);
                dispatch($createFileJob);
            }
        );
    }

}
