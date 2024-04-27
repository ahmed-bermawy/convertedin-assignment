<?php

namespace App\Jobs;

use App\Repositories\StatisticRepository;
use App\Repositories\TaskRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateTaskCountJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private mixed $userId;
    private TaskRepository $taskRepository;
    private StatisticRepository $statisticRepository;

    /**
     * Create a new job instance.
     */
    public function __construct($userId, TaskRepository $taskRepository, StatisticRepository $statisticRepository)
    {
        $this->userId = $userId;
        $this->taskRepository = $taskRepository;
        $this->statisticRepository = $statisticRepository;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $assignedTasksCount = $this->taskRepository->totalTaskCount($this->userId);
        $this->statisticRepository->updateTaskCount($this->userId, $assignedTasksCount);
    }
}
