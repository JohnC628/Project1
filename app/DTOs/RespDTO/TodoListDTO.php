<?php
//取得所有待辦事項的DTO
namespace App\DTOs\RespDTO;
use App\Models\Todo;

readonly class TodoListDTO
{
    //建立一個建構子，讓外部可以直接使用 new TodoListDTO(...) 的方式來建立物件
    public function __construct(
        public int $id,
        public string $title,
        public string $description,
        public bool $is_completed,
    ){}

     //專門處裡⌈單一筆⌋Model的轉換
     public static function fromModel(Todo $todo): self
     {
        return new self(
            id: $todo->id,
            title: $todo->title,
            description: $todo->description,
            is_completed: $todo->is_completed, 
        );
     }

}