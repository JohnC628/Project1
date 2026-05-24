<?php
namespace App\DTOs\ReqDTO;
use App\Http\Requests\DeleteTodoRequest;

readonly class DeleteTodoDTO
{
    
    public function __construct(
        public int $id,
    ){}

    //專門處裡⌈單一筆⌋Model的轉換
    public static function fromRequest(DeleteTodoRequest $request): self
    {
            return new self(
            id: $request->validated('id'),
        );
    }
}