<?php


namespace App\FileManager;


class FilesList
{

    public function getList(string $path): array
    {
        try {
            return scandir(
                $path
            );
        } catch (Exception $e) {
            return false;
        }
    }
}