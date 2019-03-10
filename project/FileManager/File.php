<?php


namespace App\FileManager;


use phpDocumentor\Reflection\Types\ContextFactory;

class File
{

    public function put(string $path, string $content): int
    {
        try {
            return file_put_contents(
                $path,
                $content
            );
        } catch (Exception $e) {
            return false;
        }
    }

    public function get(string $path): string
    {
        try {
            return file_get_contents(
                $path
            );
        } catch (Exception $e) {
            return false;
        }
    }

    public function unlink(string $path): bool
    {
        try {
            return unlink(
                $path
            );
        } catch (Exception $e) {
            return false;
        }
    }
}