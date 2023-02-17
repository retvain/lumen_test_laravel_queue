<?php

namespace App\Jobs;

use App\Buisiness\Logic;
use App\Models\JobReadResult;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class SaveNumFromFileJob extends Job implements ShouldQueue
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
        Logic::readFile($this->uuid);
        JobReadResult::create([
            'uuid' => $this->uuid,
            'result' => true
        ]);
    }
}
