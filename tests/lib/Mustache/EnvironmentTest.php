<?php
namespace Mustache;

/**
 * @package  Mustache
 * @license  MIT License <LICENSE>
 * @link     http://github.com/adlawson/mustache
 *
 * @group integration
 */
class EnvironmentTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @return array
     */
    public function containerInterfaceProvider()
    {
        return array(
            array('getCacheDriver', 'Mustache\Cache\CacheDriverInterface'),
            array('getCompiler',    'Mustache\Compiler\CompilerInterface'),
            array('getLexer',  'Mustache\Lexer\LexerInterface'),
            array('getParser', 'Mustache\Parser\ParserInterface')
        );
    }

    public function setUp()
    {
        $this->container = new Environment();
    }

    /**
     * @dataProvider containerInterfaceProvider
     * 
     * @param string $method
     * @param string $expected
     */
    public function testGetterInstances($method, $expected)
    {
        $this->assertInstanceOf($expected, call_user_func(array($this->container, $method)));
    }
}
