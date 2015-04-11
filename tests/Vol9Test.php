<?php

namespace NagoyaPHP\Vol9;

class Vol9Test extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Vol9
     */
    protected $skeleton;

    protected function setUp()
    {
        parent::setUp();
        $this->skeleton = new Vol9;
    }

    public function testNew()
    {
        $actual = $this->skeleton;
        $this->assertInstanceOf('\NagoyaPHP\Vol9\Vol9', $actual);
    }

    public function testException()
    {
        $this->setExpectedException('\NagoyaPHP\Vol9\Exception\LogicException');
        throw new Exception\LogicException;
    }
}
