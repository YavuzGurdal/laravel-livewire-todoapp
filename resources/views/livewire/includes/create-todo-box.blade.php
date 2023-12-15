<div class="container content py-6 mx-auto">
    <div class="mx-auto">
        <div id="create-form" class="hover:shadow p-6 bg-gray-800 border-blue-700 border-t-2 rounded-md">
            <div class="flex ">
                <h2 class="font-semibold text-lg text-gray-300 mb-5">Create New Todo</h2>
            </div>
            <div>
                <form>
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-300 dark:text-white">*
                            Todo </label>
                        <input wire:model='name' type="text" id="name" placeholder="Todo.."
                            class="bg-gray-600 text-gray-100 text-sm rounded block w-full p-2.5">
                        @error('name')
                            <span class="text-red-500 text-xs mt-3 block ">{{ $message }}</span>
                        @enderror
                    </div>
                    <button wire:click.prevent='create' type="submit"
                        class="px-4 py-2 bg-blue-700 text-white font-semibold rounded hover:bg-blue-600">Create
                        +</button>
                    @if (session('success'))
                        <span class="text-green-500 text-xs">{{ session('success') }}</span>
                    @endif

                </form>
            </div>
        </div>
    </div>
</div>
