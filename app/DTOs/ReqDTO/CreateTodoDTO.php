<?php
//建立待辦事項的DTO
namespace App\DTOs\ReqDTO;
use App\Http\Requests\CreateTodoRequest;

readonly class CreateTodoDTO
{
    
    public function __construct(
        public string $title,//標題
        public string $description,//敘述
        public bool $is_completed,//是否完成
        public int $user_id,//使用者ID
    ){}

    //專門處裡⌈單一筆⌋Model的轉換
    public static function fromRequest(CreateTodoRequest $request): self
    {
            return new self(
            title: $request->validated('title'),
            description: $request->validated('description'),
            is_completed: $request->validated('is_completed', false),//預設false
            user_id: 1,//先寫死，之後會改成 auth()->user() 拿
        );
    }

    //把物件本身轉換成陣列
    public function toArray(): array
    {
        return [
            'title'        => $this->title,
            'description'  => $this->description,
            'is_completed' => $this->is_completed,
            'user_id'      => $this->user_id,
        ]; 
    }

}