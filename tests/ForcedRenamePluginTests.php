<?php

use Mazpaijo\Flysystem\Plugin\ForcedRename;
use PHPUnit\Framework\TestCase;

class ForcedRenamePluginTests extends TestCase
{
    use \PHPUnitHacks;

    protected $filesystem;
    protected $plugin;

    public function setUp()
    {
        $this->filesystem = $this->prophesize('Mazpaijo\Flysystem\FilesystemInterface');
        $this->plugin = new ForcedRename();
        $this->plugin->setFilesystem($this->filesystem->reveal());
    }

    public function testPluginSuccess()
    {
        $this->assertSame('forceRename', $this->plugin->getMethod());

        $this->filesystem->delete('newpath')->willReturn(true)->shouldBeCalled();
        $this->filesystem->rename('path', 'newpath')->willReturn(true)->shouldBeCalled();

        $this->assertTrue($this->plugin->handle('path', 'newpath'));
    }

    public function testPluginDeleteNotExists()
    {
        $this->filesystem->delete('newpath')
            ->willThrow('Mazpaijo\Flysystem\FileNotFoundException', 'newpath')
            ->shouldBeCalled();

        $this->filesystem->rename('path', 'newpath')->willReturn(true)->shouldBeCalled();

        $this->assertTrue($this->plugin->handle('path', 'newpath'));
    }

    public function testPluginDeleteFail()
    {
        $this->filesystem->delete('newpath')->willReturn(false)->shouldBeCalled();
        $this->assertFalse($this->plugin->handle('path', 'newpath'));
    }
}
