<?php

namespace App\Repositories;

use App\Models\Statistic;

class StatisticRepository
{
    public function getTopTenUsersWithHighestTaskCount()
    {
        return Statistic::orderBy('task_count', 'desc')->take(10)->get();
    }

    public function updateTaskCount(int $userId, int $assignedTasksCount): Statistic
    {
        return Statistic::updateOrCreate(
            ['user_id' => $userId],
            ['task_count' => $assignedTasksCount]
        );
    }
}