<?php

namespace Database\Seeders;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();
        $tasks = ['Working', 'Completed', 'Lazy', 'To hard', 'In progress', 'done', 'want to do', 'wanna be'];
        foreach ($tasks as $task) {
            Task::create([
            'task_name' => $task,
            'task_description' => $task,
            'status_id' => rand(1,4),
            'add_date' => $now,
            'completed_date' => $now,
            'created_at' => $now,
            ]);
        }
    }
}
