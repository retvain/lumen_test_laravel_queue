<?php

declare(strict_types=1);

namespace App\Buisiness;

use App\Models\Guid;
use App\Models\JobReadFile;
use App\Models\JobReadResult;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Logic
{
    public static function makeFile (string $uuid): void
    {
        $num = rand(0, 100000);
        file_put_contents(storage_path('files' . DIRECTORY_SEPARATOR . $uuid . '.txt'), $num);
        JobReadFile::create([
            'job_guid_generate_uuid' => $uuid,
            'result' => true
        ]);
    }

    public static function readFile(string $uuid)
    {
        $file = storage_path('files' . DIRECTORY_SEPARATOR . $uuid . '.txt');
        $num = (int)file_get_contents($file);
        DB::table('number')->insert(['number' => $num, 'uuid_guid' => $uuid]);
        unlink($file);
    }
}
