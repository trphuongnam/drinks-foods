<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\Public\SendMailController;
use App\Models\Order;
use App\Models\User;

class RepostRevenue extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'repost_revenue:sendMail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->sendMailController = new SendMailController;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        /* Get email of user type = 1 (admin) */
        $email = User::scopeGetEmailAdmin();
        $email_received = [];
        for($i = 0; $i < count($email); $i++)
        {
            array_push($email_received, $email[$i]['email']);
        }

        $information = [
            'totalOrderFinished'=>Order::countTotalOrderFinished(), 
            'totalAmountMonth'=>Order::countTotalAmountMonth()
        ];
        
        /* Call function send mail controller */
        return $this->sendMailController->sendMailReportRevenue($email_received, $information);
    }
}
