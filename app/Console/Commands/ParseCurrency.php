<?php

namespace App\Console\Commands;

use App\Services\CommandsOfCurrency;
use Illuminate\Console\Command;


class ParseCurrency extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currency:parse';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse XML of CB and update database';

    /**
     * Execute the console command.
     *
     * @return int
     */

    public function handle(CommandsOfCurrency $commandsOfCurrency)
    {
        $xmlOfCurrency = $commandsOfCurrency->getXmlOfCB();
        $dataOfCB = $commandsOfCurrency->getDataOfCB($xmlOfCurrency);
        $arrayAllCurrency = $commandsOfCurrency->getArrayOfCurrency($xmlOfCurrency);
        $arrayOfQueryCurrency = $commandsOfCurrency->filterOfCurrency($arrayAllCurrency);
        $commandsOfCurrency->updateOrCreateCurrency($arrayOfQueryCurrency, $dataOfCB);
    }
}








