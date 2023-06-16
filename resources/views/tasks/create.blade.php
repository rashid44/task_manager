<x-guest-layout>
    <div class="px-6 py-4">
        <div>
            <h1 class="my-4 text-lg font-bold">Create a new Task </h1>
        </div>
        <form class="mb-6" action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <div class="mb-6">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                    Title</label>
                <input name="title" type="text" id="title"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Enter the title" required>
            </div>
            <div class="mb-6">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Task Description</label>
                <textarea name="description" id="message" rows="4"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Enter task description"></textarea>

            </div>

            <div class="mb-6">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </div>
        </form>

        <a href="{{ route('tasks') }}">Go Back</a>
    </div>
</x-guest-layout>
