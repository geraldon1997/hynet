<?php

namespace App\Console\Commands;

use App\Deposit;
use App\Http\Controllers\DepositController;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class UpdateDailyProfit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily_profit:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'updates daily profit of investors';

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
    public function handle(DepositController $deposit)
    {
        return $deposit->dailyProfit();
    }
}
