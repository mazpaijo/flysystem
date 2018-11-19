<?php

namespace Mazpaijo\Flysystem\Adapter;

use Mazpaijo\Flysystem\Util\StreamHasher;
use PHPUnit\Framework\TestCase;

class StreamHasherTest extends TestCase
{
    use \PHPUnitHacks;

    public function testHasher()
    {
        $filename = __DIR__.'/../src/Filesystem.php';
        $this->assertEquals(
            md5_file($filename),
            (new StreamHasher('md5'))->hash(fopen($filename, 'r'))
        );
    }
}
