<?php

namespace Mazpaijo\Flysystem\Stub;

use Mazpaijo\Flysystem\Adapter\Polyfill\StreamedWritingTrait;
use Mazpaijo\Flysystem\Config;

class StreamedWritingStub
{
    use StreamedWritingTrait;

    public function write($path, $contents, Config $config)
    {
        return compact('path', 'contents');
    }

    public function update($path, $contents, Config $config)
    {
        return compact('path', 'contents');
    }
}
