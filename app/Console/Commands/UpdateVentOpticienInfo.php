<?php

namespace App\Console\Commands;

use App\Models\Vent;
use App\Models\OpticienInfo;
use Illuminate\Console\Command;

class UpdateVentOpticienInfo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vents:update-opticien-info';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update all existing Vent records with the active OpticienInfo';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $opticienInfo = OpticienInfo::where('is_active', true)->first();
        
        if (!$opticienInfo) {
            $this->error('No active OpticienInfo found');
            return 1;
        }
        
        $count = Vent::whereNull('opticien_info_id')->update([
            'opticien_info_id' => $opticienInfo->id
        ]);
        
        $this->info("Updated {$count} Vent records with OpticienInfo ID: {$opticienInfo->id}");
        
        return 0;
    }
} 