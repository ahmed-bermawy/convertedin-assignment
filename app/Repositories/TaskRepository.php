<?php

namespace App\Repositories;

use App\Jobs\UpdateTaskCountJob;
use App\Models\Task;

class TaskRepository
{
    private StatisticRepository $statisticRepository;

    public function __construct(StatisticRepository $statisticRepository)
    {
        $this->statisticRepository = $statisticRepository;
    }

    public function getList()
    {
        return Task::orderBy('created_at', 'desc')->paginate(10);
    }

    public function create(array $data): void
    {
        $task = [
            'title' => $data['title'],
            'description' => $data['description'],
            'assigned_to_id' => $data['assigned_to'],
            'assigned_by_id' => $data['assigned_by'],
        ];

        Task::create($task);

        UpdateTaskCountJob::dispatch($data['assigned_to'], $this, $this->statisticRepository);
    }

    public function totalTaskCount($assignedToId)
    {
        return Task::where('assigned_to_id', $assignedToId)->count();
    }
}