<?php
namespace App\DTOs\ReqDTO;
use Illuminate\Http\Request;

readonly class UpdateTodoDTO
{
    // 這邊的欄位都改為可空，因為更新的時候可能只更新其中一兩個欄位
    public function __construct(
        public int $id,
        public ?string $title,
        public ?string $description,
        public ?bool $is_completed,
    ) {}

    public static function fromRequest(Request $request): self
    {
        // 這邊要用input而不是validated，因為更新的時候可能只更新其中幾個欄位，validated對應欄位不可以為null
        return new self(
            id: $request->input('id'),
            title: $request->input('title'),
            description: $request->input('description'),
            is_completed: $request->input('is_completed'),
        );
    }

    /**
     * 過濾掉 null 的欄位，只回傳有值的陣列
     */
    public function toUpdateArray(): array
    {
        return array_filter([
            'title'        => $this->title,
            'description'  => $this->description,
            'is_completed' => $this->is_completed,
        ], fn($value) => !is_null($value)); 
    }
}
