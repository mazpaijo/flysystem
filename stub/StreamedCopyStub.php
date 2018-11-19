<?php

namespace Mazpaijo\Flysystem\Stub;

use Mazpaijo\Flysystem\Adapter\Polyfill\StreamedCopyTrait;
use Mazpaijo\Flysystem\Config;

class StreamedCopyStub
{
    use StreamedCopyTrait;

    /**
     * @var resource
     */
    private $readResponse;

    /**
     * @var resource|null
     */
    private $writeResponse;

    public function __construct($readResponse, $writeResponse = null)
    {
        $this->readResponse = $readResponse;
        $this->writeResponse = $writeResponse;
    }

    /**
     * @param  string   $path
     * @return resource
     */
    public function readStream($path)
    {
        return $this->readResponse;
    }

    /**
     * @param  string   $path
     * @param  resource $resource
     * @param  Config   $config
     * @return resource
     */
    public function writeStream($path, $resource, Config $config)
    {
        return $this->writeResponse;
    }
}
