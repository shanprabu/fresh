<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Forex;

class ListForex extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'forex:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List of Forex';

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
        $forex=new Forex;
        $forexData=$forex->all();
        foreach($forexData as $forexRecord)
        {
            $this->info($forexRecord->currency . " - " . $forexRecord->currencyrate);
        }
        //
    }
}
