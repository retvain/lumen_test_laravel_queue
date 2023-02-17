<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Jobs\CreateFileJob;
use App\Models\Guid;
use App\Models\JobGuidGenerate;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Webpatser\Uuid\Uuid;

/**
 * Class MedoSendClaimCommand сканирует папку входящих сообщений МЭДО
 *
 * @category Console_Command
 * @package  App\Console\Commands
 */
class CreateFileCommand extends Command
{
    /**
     * Вызов команды.
     *
     * @var string
     */
    protected $signature = "file:create";

    /**
     * Описание команды.
     *
     * @var string
     */
    protected $description = "Создать очередь на создание файлов";

    /**
     * Execute the console command.
     *
     * @throws Exception
     */
    public function handle()
    {
        $count = 1;
        while (true) {
            if ($count > 1000) {
                break;
            }
            $uuid = Uuid::generate(4)->string;
            JobGuidGenerate::create([
                'guid_uuid' => $uuid
            ]);
            Guid::create(['uuid' => $uuid]);
            $count++;
        }
    }
}
