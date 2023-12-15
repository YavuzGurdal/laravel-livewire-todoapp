<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class TodoList extends Component
{
    use WithPagination;

    #[Rule('required|min:3|max:100')]
    public $name;

    // #[Rule('required|min:3|max:100')]
    public $search;

    public $editingTodoId;

    #[Rule('required|min:3|max:100')]
    public $editingTodoName;

    public function create()
    {
        $validated = $this->validateOnly('name');

        Todo::create($validated);

        $this->reset('name');

        session()->flash('success', 'Todo created successfully');

        $this->resetPage(); // bu ilk sayfaya yonlendiriyor
    }

    // public function delete(Todo $todo){
    //     $todo->delete();
    //     session()->flash('success', 'Todo deleted successfully');
    // }

    public function delete($todoId)
    {
        try {
            Todo::findOrFail($todoId)->delete();
            // session()->flash('success', 'Todo deleted successfully');
        } catch (\Throwable $th) {
            session()->flash('error', 'Todo not found');

            return;
        }
    }

    public function toogleComplete($todoId)
    {
        $todo = Todo::find($todoId);
        $todo->completed = !$todo->completed;
        $todo->save();
    }

    public function edit($todoId)
    {
        $this->editingTodoId = $todoId;
        $this->editingTodoName = Todo::find($todoId)->name;
    }

    public function update()
    {
        $validated = $this->validateOnly('editingTodoName');

        Todo::find($this->editingTodoId)->update(['name' => $validated['editingTodoName']]);

        $this->cancelEdit();

        // $this->reset('editingTodoId', 'editingTodoName');

        // session()->flash('success', 'Todo updated successfully');
    }

    public function cancelEdit()
    {
        $this->reset('editingTodoId', 'editingTodoName');
    }

    public function render()
    {
        return view('livewire.todo-list', [
            'todos' => Todo::latest()
            ->where('name', 'like', "%{$this->search}%")
            ->paginate(3),
        ]);
    }
}
