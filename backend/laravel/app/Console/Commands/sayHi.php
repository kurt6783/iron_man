<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Message;

class sayHi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'message:sayHi';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Say hi to every by message board';

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
        Message::create([
            'member' => 'admin',
            'message' => 'Hi everyone',
        ]);
    }
}
