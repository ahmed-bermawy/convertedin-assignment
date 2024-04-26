<?php

namespace Database\Seeders;

use App\Models\Statistic;
use App\Models\Task;
use Illuminate\Database\Seeder;

class StatisticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = Task::select('assigned_to_id')
            ->selectRaw('COUNT(*) as task_count')
            ->groupBy('assigned_to_id')
            ->get();

        foreach ($users as $user) {
            Statistic::create([
                'user_id' => $user->assigned_to_id,
                'task_count' => $user->task_count,
            ]);
        }
    }
}
