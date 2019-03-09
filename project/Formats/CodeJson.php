<?php


namespace App\Formats;


class CodeJson
{
    static public function encode(array $data): string
    {
        return json_encode($data);
    }

    static public function decode(string $json): array
    {
        return json_decode($json, true) ?? [];
    }
}