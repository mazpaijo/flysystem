<?php

use Mazpaijo\Flysystem\Adapter\Ftp;
use Mazpaijo\Flysystem\AdapterInterface;

include_once __DIR__.'/FtpIntegrationTestCase.php';

/**
 * @group integration
 */
class FtpManualRecursionIntegrationTests extends FtpIntegrationTestCase
{
    /**
     * @return AdapterInterface
     */
    protected function setup_adapter()
    {
        return new Ftp([
            'host'            => 'localhost',
            'username'        => 'bob',
            'password'        => 'test',
            'recurseManually' => true,
        ]);
    }
}