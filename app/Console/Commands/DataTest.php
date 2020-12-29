<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Admin;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Schedule;

class DataTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'display:all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Display all table content';


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
        var_dump(Admin::all());
        var_dump(Doctor::all());
        var_dump(Patient::all());
        var_dump(Schedule::with('doctor', 'patient')->get());
    }
}
