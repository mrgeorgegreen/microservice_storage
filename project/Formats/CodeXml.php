<?php


namespace App\Formats;


class CodeXml
{
    static public function encode(array $data): string
    {
        return xmlrpc_encode($data);
    }

    static public function decode(string $xml): array
    {
        return xmlrpc_decode($xml, true) ?? [];
    }
}