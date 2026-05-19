<?php
namespace App\Services;

use App\Models\Todo;
use App\DTOs\RespDTO\TodoListDTO;
use App\DTOs\ReqDTO\CreateTodoDTO;

use illuminate\Support\Collection;

class TodoService{
    /**
     * Summary of getAllTodos
     * @return Collection<int,  TodoListDTO>|\Illuminate\Database\Eloquent\Collection<int, TodoListDTO>
     */

    public function getAllTodos(): Collection
    {
        //1. 拿所有資料
        // 補充：如果只要在todo表裡拿特定欄位的資料寫法如右=>Todo::all(['filed1', field2]
        $todos = Todo::all();

        //2. 將包含 Model 的集合，轉換成包含 DTO 的集合
        return $todos->map(fn(Todo $todo) => TodoListDTO::fromModel($todo));
    } 

    /**
     * Summary of createTodo
     * @param createTodoDTO $data
     * @return bool
     */
    public function createTodo(CreateTodoDTO $data): bool
    {
        return !!Todo::create($data->toArray());
    }

}

