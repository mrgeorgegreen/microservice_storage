<?php


namespace App\FileManager;


class File
{

    public function put(string $path, string $content): int
    {
        return file_put_contents(
            $path,
            $content
        );
    }

    public function get(string $path): string
    {
        return file_get_contents(
            $path
        );
    }

}