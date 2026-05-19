<?php

namespace App\Services;

class PasswordService
{
    public function generate(int $length = 8, bool $includesSymbols = false): string
    {
        // 基礎字元庫（大小寫英文 + 數字）
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

        // 如果允許特殊符號，就把符號加進字元庫
        if ($includesSymbols) {
            $characters .= '!@#$%^&*()_+-=[]{}|;:,.<>?';
        }

        // 打亂字元庫並截取需要的長度
        // (這是一個簡單的寫法，實際應用中可使用 Laravel 內建的 Str::random)
        $password = substr(str_shuffle(str_repeat($characters, 5)), 0, $length);

        return $password;
    }
}