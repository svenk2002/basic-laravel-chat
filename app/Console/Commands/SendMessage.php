<?php

namespace App\Console\Commands;

use App\Events\MessageEvent;
use Illuminate\Console\Command;

class SendMessage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:message {message}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Triggers a message on the chat channel';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $message = $this->argument('message');

        event(new MessageEvent($message));

        return 0;
    }
}
