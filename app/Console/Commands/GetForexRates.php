<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;

class GetForexRates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'forex:getrates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get exchange rates from server and update database';

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
        //
        $this->info('Fetching Forex Rates. Please wait...');
        $client=new Client(array('base_uri'=>'http://api.fixer.io/'));
        $response=$client->request('GET','latest?base=USD');
        //$this->info($response);
        $rateInfo=json_decode($response->getBody()->getContents());
        //print_r($rateInfo);
        //dd($rateInfo);
        
        $this->info('1 USD = ' . $rateInfo->rates->AUD . ' AUD');
        $this->info('1 USD = ' . $rateInfo->rates->EUR . ' EUR');
        $this->info('1 USD = ' . $rateInfo->rates->GBP . ' GBP');
        $this->info('1 USD = ' . $rateInfo->rates->INR . ' INR');
    }
}
