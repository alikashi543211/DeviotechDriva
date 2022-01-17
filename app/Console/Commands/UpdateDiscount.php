<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\GarageProfile;
use App\Discount;
use Carbon\Carbon;

class UpdateDiscount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:discount';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Garage discounts status on every minute';

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
        $list = Discount::where('expiry_date', '<=', Carbon::now())->where('status','active')->get();
        // \Log::info($list);
        foreach($list as $item) {
            $item->status = 'expired';
            $item->save();
        }

        $this->info('Garage Profile Discounts Updated Successfully.');
    }
}
