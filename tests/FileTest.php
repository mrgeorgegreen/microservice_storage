<?php

namespace App\tests;

use App\FileManager\File;
use org\bovigo\vfs\vfsStream;
use PHPUnit\Framework\TestCase;

class FileTest extends TestCase
{
    private $root;

    public function setUp()
    {
        $this->root = vfsStream::setup('exampleDir');
    }

    public function testPut()
    {
        $example = new File();
        $filename = 'hello.txt';
        $content = 'Hello world';
        $this->assertFalse($this->root->hasChild($filename));
        $example->put(vfsStream::url('exampleDir/' . $filename), $content);
        $this->assertTrue($this->root->hasChild($filename));
    }

    public function testDownload()
    {
        $example = new File();
        $filename = 'hello.txt';
        $content = 'Hello world';
        $this->assertFalse($this->root->hasChild($filename));
        $example->put(vfsStream::url('exampleDir/' . $filename), $content);
        $example->get(vfsStream::url('exampleDir/' . $filename));
        $this->assertTrue($this->root->hasChild($filename));
    }
}