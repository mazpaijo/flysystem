<?php

use Mazpaijo\Flysystem\Filesystem;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;

class FlysystemStreamTests extends TestCase
{
    use \PHPUnitHacks;

    public function testWriteStream()
    {
        $stream = tmpfile();
        $adapter = $this->prophesize('Mazpaijo\Flysystem\AdapterInterface');
        $adapter->has('file.txt')->willReturn(false)->shouldBeCalled();
        $adapter->writeStream('file.txt', $stream, Argument::type('Mazpaijo\Flysystem\Config'))
            ->willReturn(['path' => 'file.txt'], false)
            ->shouldBeCalled();
        $filesystem = new Filesystem($adapter->reveal());
        $this->assertTrue($filesystem->writeStream('file.txt', $stream));
        $this->assertFalse($filesystem->writeStream('file.txt', $stream));
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testWriteStreamFail()
    {
        $filesystem = new Filesystem($this->createMock('Mazpaijo\Flysystem\AdapterInterface'));
        $filesystem->writeStream('file.txt', 'not a resource');
    }

    public function testUpdateStream()
    {
        $stream = tmpfile();
        $adapter = $this->prophesize('Mazpaijo\Flysystem\AdapterInterface');
        $adapter->has('file.txt')->willReturn(true)->shouldBeCalled();

        $adapter->updateStream('file.txt', $stream, Argument::type('Mazpaijo\Flysystem\Config'))
            ->willReturn(['path' => 'file.txt'], false)
            ->shouldBeCalled();

        $filesystem = new Filesystem($adapter->reveal());

        $this->assertTrue($filesystem->updateStream('file.txt', $stream));
        $this->assertFalse($filesystem->updateStream('file.txt', $stream));
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testUpdateStreamFail()
    {
        $filesystem = new Filesystem($this->createMock('Mazpaijo\Flysystem\AdapterInterface'));
        $filesystem->updateStream('file.txt', 'not a resource');
    }

    public function testReadStream()
    {
        $adapter = $this->prophesize('Mazpaijo\Flysystem\AdapterInterface');
        $adapter->has(Argument::type('string'))->willReturn(true)->shouldBeCalled();
        $stream = tmpfile();
        $adapter->readStream('file.txt')->willReturn(['stream' => $stream])->shouldBeCalled();
        $adapter->readStream('other.txt')->willReturn(false)->shouldBeCalled();
        $filesystem = new Filesystem($adapter->reveal());
        $this->assertInternalType('resource', $filesystem->readStream('file.txt'));
        $this->assertFalse($filesystem->readStream('other.txt'));
        fclose($stream);
        $this->assertFalse($filesystem->readStream('other.txt'));
    }
}
