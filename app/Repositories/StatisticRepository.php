<?php

namespace App\Repositories;

use App\Models\Statistic;

class StatisticRepository
{
    public function updateTaskCount(int $userId, int $assignedTasksCount): Statistic
    {
        return Statistic::updateOrCreate(
            ['user_id' => $userId],
            ['task_count' => $assignedTasksCount]
        );
    }
}