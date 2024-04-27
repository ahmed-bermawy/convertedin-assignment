<?php

namespace Tests\Unit;

use App\Http\Controllers\TaskController;
use App\Repositories\TaskRepository;
use App\Repositories\UserRepository;
use Illuminate\View\View;
use Tests\TestCase;

class TaskControllerTest extends TestCase
{

    private $taskRepository;
    private $controller;

    protected function setUp(): void
    {
        parent::setUp();

        $this->userRepository = $this->createMock(UserRepository::class);
        $this->taskRepository = $this->createMock(TaskRepository::class);
        $this->controller = new TaskController($this->userRepository ,$this->taskRepository);
    }

    public function testIndex(): void
    {
        $response = $this->get('/tasks');

        $response->assertStatus(200);
    }

    public function testIndexReturnsCorrectViewWithTasks()
    {
        $tasks = ['Task 1', 'Task 2', 'Task 3'];
        $this->taskRepository->method('getList')->willReturn($tasks);

        $response = $this->controller->index();

        $this->assertInstanceOf(View::class, $response);
        $this->assertEquals('tasks.index', $response->name());
        $this->assertEquals($tasks, $response->getData()['tasks']);
    }

    public function testIndexReturnsEmptyArrayWhenNoTasks()
    {
        $this->taskRepository->method('getList')->willReturn([]);

        $response = $this->controller->index();

        $this->assertInstanceOf(View::class, $response);
        $this->assertEquals('tasks.index', $response->name());
        $this->assertEquals([], $response->getData()['tasks']);
    }
}
