<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Status;
use Carbon\Carbon;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();
        $produktai = ['Working', 'Completed', 'Lazy', 'To hard', 'In progress'];
        foreach ($produktai as $produktas) {
            Status::create([
            'name' => $produktas,
            'created_at' => $now,
            ]);
        }
    }
}
