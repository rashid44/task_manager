<?php

namespace App\Http\Controllers;

use App\Interfaces\TaskRepositoryInterface;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    private TaskRepositoryInterface $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function index()
    {
        $tasks = $this->taskRepository->getAllTasks();

        return view('tasks.index', ['tasks' => $tasks]);
    }

    public function show(Task $task)
    {
        $task = $this->taskRepository->getTaskById($task->id);

        if (empty($task)) {
            return back();
        }

        return view('tasks.show', ['task' => $task]);
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            'title' => 'required|string',
            'description' => 'required|string'
        ]);

        $this->taskRepository->createTask($validated);

        return redirect()->route('tasks');
    }

    public function edit(Task $task)
    {
        $task = $this->taskRepository->getTaskById($task->id);

        if (empty($task)) {
            return back();
        }

        return view('tasks.edit', ['task' => $task]);
    }

    public function update(Request $request, Task $task)
    {
        $validated = $this->validate($request, [
            'title' => 'required|string',
            'description' => 'required|string'
        ]);

        if (isset($request->is_completed)) {
            $validated['is_completed'] = true;
        } else {
            $validated['is_completed'] = false;
        }

        $this->taskRepository->updateTask($task->id, $validated);

        return redirect()->route('tasks');
    }

    public function destroy(Request $request, Task $task)
    {
        $this->taskRepository->deleteTask($task->id);

        return back();
    }
}
