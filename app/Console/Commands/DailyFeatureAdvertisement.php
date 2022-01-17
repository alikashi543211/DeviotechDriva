<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\GarageAdvertising;
use App\GarageProfile;

class DailyFeatureAdvertisement extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'advertisement:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Your Featured Garage Advertisements On Daily Basis';

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
        $list = GarageAdvertising::where('end_date', '=' , date('d-m-Y'))->where('status','active')->get();

        foreach($list as $item) {
            $item->status='ended';
            $item->save();
            $garage = GarageProfile::find($item->garage_profile_id);
            $garage->search_radius = 0;
            $garage->is_featured = 0;
            $garage->save();
        }

        $this->info('Featured Garage Advertisements Updated Successfully.');
    }
}
