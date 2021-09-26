<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\ExchangeRate;

class getExchangeRate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:exchangeRate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get exchange rate by third party api';

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
        $data = Http::get('https://tw.rter.info/capi.php')->json();

        foreach($data as $key => $value)
        {
            $currency = explode('USD', $key);
            
            if (count($currency) == 2 && $currency[1] != null) {
                ExchangeRate::create([
                    'currency' => $currency[1],
                    'exchange_rate' => $value['Exrate'],
                ]);
            }
        }
    }
}
