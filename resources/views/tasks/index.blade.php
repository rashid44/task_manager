<x-guest-layout>
    <div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Title
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Description
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Completed
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                @if ($tasks->count() > 0)
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <td class="px-6 py-4">
                                    {{ $task->title }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $task->description }}
                                </td>
                                <td class="px-6 py-4">
                                    @if ($task->is_completed)
                                        <span>Completed</span>
                                    @else
                                        <span>Not completed</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <div class="inline-flex">
                                        <a href="{{ route('tasks.show', $task) }}"
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
                                        <form class="ml-2" method="POST" action="{{ route('tasks.destroy', $task) }}">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="text-red-500 cursor-pointer hover:underline">Delete</button>
                                        </form>
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                @endif

            </table>
        </div>

    </div>
</x-guest-layout>
