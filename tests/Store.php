<?php

namespace DesignPatterns\Behavioral\ChainOfResponsibilities\Tests;

use org\bovigo\vfs\vfsStream;
use org\bovigo\vfs\vfsStreamDirectory;
use PHPUnit\Framework\TestCase;

class FileTest extends TestCase
{
    /**
     * @var  vfsStreamDirectory
     */
    private $root;

    /**
     * set up test environmemt
     */
    public function setUp()
    {
        $this->root = vfsStream::setup('exampleDir');
    }

    /**
     * test that the file is created
     */
    public function testFileIsCreated()
    {
        $example = $this->createMock(SomeClass::class);;
        $filename = 'hello.txt';
        $content = 'Hello world';
        $this->assertFalse($this->root->hasChild($filename));
        $example->put(vfsStream::url('exampleDir/' . $filename), $content);
        $this->assertTrue($this->root->hasChild($filename));
    }
}