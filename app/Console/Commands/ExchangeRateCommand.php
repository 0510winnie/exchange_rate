<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\ExchangeRateService;
use Log;
use Mail;
use App\Mail\ExchangeRateMail;

class ExchangeRateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'query:exchange_rate {currency}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'get exchange rate from ....';

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
     * @return mixed
     */
    public function handle()
    {
        $currency = $this->argument('currency');
        $rate = (new ExchangeRateService())->query($currency);
        Mail::to('0510winnie@gmail.com')->send(new ExchangeRateMail($rate));
    }
}
