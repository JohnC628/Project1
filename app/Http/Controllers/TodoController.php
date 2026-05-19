<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TodoService;
use App\DTOs\ReqDTO\CreateTodoDTO;

use Illuminate\Http\JsonResponse;
use App\Http\Requests\CreateTodoRequest;

class TodoController extends Controller
{
    protected TodoService $todoService;

    public function __construct(TodoService $todoService){
        $this->todoService = $todoService;
    } 

    /**
     * 抓取所有的Todo
     */
    public function getAllTodos(): JsonResponse
    {   
        // 1. 從 Service 拿到資料
        $todos = $this->todoService->getAllTodos();

        if($todos->isEmpty()){
            return response()->json([
                'success' => false,
                'message' => '沒有待辦事項',
                'data' => []
            ], 200, [], JSON_UNESCAPED_UNICODE); 
        }
        
        // 2.包裝成標準的API JSON 格式回傳給前端
        return response()->json([
            'success' => true,
            'message' => '取得待辦列表成功',
            'data' => $todos
        ], 200, [], JSON_UNESCAPED_UNICODE);
    }

    /**
     *  新增Todo
     */
    public function createTodo(CreateTodoRequest $request): JsonResponse
    {
        // 1. 手動將 Request 轉成 DTO
        $reqDto = CreateTodoDTO::fromRequest($request);

        // 2. 呼叫 Service
        $newTodo = $this->todoService->createTodo($reqDto);

        // 3. 判斷是建立成功
        if($newTodo){
            return response()->json([
                'success' => true,
                'message' => '新增待辦事項成功',
            ], 201, [], JSON_UNESCAPED_UNICODE);
        }

        // 如果 Service 回傳 null (或是 false)，就會走到這裡
        return response()->json([
            'success' => false,
            'message' => '新增待辦事項失敗',
        ], 400, [], JSON_UNESCAPED_UNICODE);
    }  
}