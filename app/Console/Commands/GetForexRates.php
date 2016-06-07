<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use App\Forex;

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
        $rateInfo=json_decode($response->getBody()->getContents());
        
        $forex = new Forex;
        
        $forexRecord=array(
            array('currency'=>'AUD','currencyrate'=>$rateInfo->rates->AUD),
            array('currency'=>'EUR','currencyrate'=>$rateInfo->rates->EUR),
            array('currency'=>'GBP','currencyrate'=>$rateInfo->rates->GBP),
            array('currency'=>'INR','currencyrate'=>$rateInfo->rates->INR)
        );
        
        $this->info('1 USD = ' . $rateInfo->rates->AUD . ' AUD');        
        $this->info('1 USD = ' . $rateInfo->rates->EUR . ' EUR');
        $this->info('1 USD = ' . $rateInfo->rates->GBP . ' GBP');
        $this->info('1 USD = ' . $rateInfo->rates->INR . ' INR');
        
        foreach($forexRecord as $forexInfo)
        {
            if($forex->where('currency',$forexInfo['currency'])->count()==0)
            {
                $this->info('Created');
                $forex->firstOrCreate($forexInfo);
            }
            else
            {
                $this->info ('Updated');
                $forex->where('currency',$forexInfo['currency'])->update($forexInfo);
            }
        }
    }
}
