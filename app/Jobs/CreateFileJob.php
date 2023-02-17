<?php

namespace App\Jobs;

use App\Buisiness\Logic;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\DB;

class CreateFileJob extends Job implements ShouldQueue
{
    private $uuid;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($uuid)
    {
        $this->uuid = $uuid;
    }

    /**
     * Execute the job.
     *
     * @return void
     * @throws \Exception
     */
    public function handle()
    {
        Logic::makeFile($this->uuid);
    }
}
