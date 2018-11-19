<?php

namespace Mazpaijo\Flysystem\Adapter;

use Mazpaijo\Flysystem\Stub\NotSupportingVisibilityStub;
use PHPUnit\Framework\TestCase;

class NotSupportingVisivilityTests extends TestCase
{
    use \PHPUnitHacks;

    public function testGetVisibility()
    {
        $this->expectException('LogicException');
        $stub = new NotSupportingVisibilityStub();
        $stub->getVisibility('path.txt');
    }

    public function testSetVisibility()
    {
        $this->expectException('LogicException');
        $stub = new NotSupportingVisibilityStub();
        $stub->setVisibility('path.txt', 'public');
    }
}
