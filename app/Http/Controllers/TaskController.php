<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Repositories\TaskRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    private UserRepository $userRepository;
    private TaskRepository $taskRepository;

    public function __construct(
        UserRepository $userRepository,
        TaskRepository $taskRepository
    )
    {
        $this->userRepository = $userRepository;
        $this->taskRepository = $taskRepository;
    }

    public function index()
    {
        $tasks = $this->taskRepository->getList();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $admins = $this->userRepository->getAdmins();
        $users = $this->userRepository->getUsers();
        return view('tasks.create', compact('admins', 'users'));
    }

    public function store(TaskRequest $request)
    {
        $this->taskRepository->create($request->validated());

        return redirect()->route('tasks.index');
    }

}
