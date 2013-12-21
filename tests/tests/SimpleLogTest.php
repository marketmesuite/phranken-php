<?php
namespace MarketMeSuite\Phranken\Commandline;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2013-09-18 at 17:56:53.
 */
class SimpleLogTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var SimpleLog
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new SimpleLog;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers MarketMeSuite\Phranken\Commandline\SimpleLog::log
     */
    public function testLog()
    {

        //-------- MULTI ARG --------

        ob_start();
        $this->object->log('foo', 'bar', 'baz');
        $actual = ob_get_clean();

        $this->assertSame(
            "foo\nbar\nbaz\n",
            $actual
        );


        //-------- ARRAY --------

        ob_start();
        $this->object->log(array('foo', 'bar', 'baz'));
        $actual = ob_get_clean();

        $expected = <<<EOT
Array
(
    [0] => foo
    [1] => bar
    [2] => baz
)

EOT;

        $this->assertSame(
            $expected,
            $actual
        );


        //-------- NULL or OBJECT --------

        ob_start();
        $this->object->log(null, new \stdClass());
        $actual = ob_get_clean();

        $expected = <<<EOT
NULL
stdClass Object
(
)

EOT;

        $this->assertSame(
            $expected,
            $actual
        );

        //-------- BOOLEANS --------

        ob_start();
        $this->object->log(true, false, ('a' === 'b'));
        $actual = ob_get_clean();

        $expected = <<<EOT
true
false
false

EOT;

        $this->assertSame(
            $expected,
            $actual
        );

        //-------- INTEGERS --------

        ob_start();
        $this->object->log(1234, 5678);
        $actual = ob_get_clean();

        $expected = <<<EOT
1234
5678

EOT;

        $this->assertSame(
            $expected,
            $actual
        );
    }
}
