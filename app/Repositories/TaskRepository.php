<?php

namespace App\Repositories;

use App\Models\Statistic;
use App\Models\Task;

class TaskRepository
{

    public function getList()
    {
        return Task::orderBy('created_at', 'desc')->paginate(10);
    }

    public function create(array $data)
    {
        $task = [
            'title' => $data['title'],
            'description' => $data['description'],
            'assigned_to_id' => $data['assigned_to'],
            'assigned_by_id' => $data['assigned_by'],
        ];

        Task::create($task);

        $assignedTasksCount = $this->totalTaskCount($data['assigned_to']);
        Statistic::updateOrCreate(
            ['user_id' => $data['assigned_to']],
            ['task_count' => $assignedTasksCount]
        );

    }

    private function totalTaskCount($assignedToId)
    {
        return Task::where('assigned_to_id', $assignedToId)->count();
    }

    public function getDetail(int $id)
    {
        return Task::find($id);
    }

    public function update(array $data, int $id)
    {
        $task = Task::find($id);
        $task->update($data);

        return $task;
    }

    public function delete(int $id)
    {
        $task = Task::find($id);
        $task->delete();

        return $task;
    }
}