<?php

namespace Mazpaijo\Flysystem\Stub;

use Mazpaijo\Flysystem\FilesystemInterface;
use Mazpaijo\Flysystem\PluginInterface;

class PluginStub implements PluginInterface
{
    public function setFilesystem(FilesystemInterface $filesystem)
    {
        return $this;
    }

    public function getMethod()
    {
        return 'pluginMethod';
    }

    public function handle()
    {
        return 'handled';
    }
}
