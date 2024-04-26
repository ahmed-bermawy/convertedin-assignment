<?php

namespace App\Repositories;

use App\Models\Task;

class TaskRepository
{

    public function getList()
    {
        return Task::paginate(10);
    }

    public function create(array $data)
    {
        dd($data);
        Task::create($data);

        // Update statistics table
        $assignedTasksCount = $this->totalTaskCount($data->assigned_to_id);
        //$statistics = Statistics::updateOrCreate(
        //    ['user_id' => $request->assigned_to_id],
        //    ['task_count' => $assignedTasksCount]
        //);

    }

    private function totalTaskCount($assigned_to_id)
    {
        return Task::where('assigned_to_id', $assigned_to_id)->count();
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