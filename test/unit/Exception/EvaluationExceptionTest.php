<?php

namespace Dhii\Expression\Test\Exception;

use Dhii\Expression\Exception\EvaluationException;
use Exception;
use Xpmock\TestCase;

/**
 * Tests {@see Dhii\Expression\Exception\EvaluationException}.
 *
 * @since [*next-version*]
 */
class EvaluationExceptionTest extends TestCase
{
    /**
     * The class name of the test subject.
     *
     * @since [*next-version*]
     */
    const TEST_SUBJECT_CLASSNAME = 'Dhii\\Expression\\Exception\\EvaluationException';

    /**
     * Creates a new instance of the test subject.
     *
     * @since [*next-version*]
     *
     * @param string $msg
     * @param int $code
     * @param Exception $previous
     *
     * @return EvaluationException
     */
    public function createInstance($message, $code = 1, Exception $previous = null)
    {
        return new EvaluationException($message, $code, $previous);
    }

    /**
     * Tests if a valid instance can be created.
     *
     * @since [*next-version*]
     */
    public function testCanBeCreated()
    {
        $subject = $this->createInstance('');

        $this->assertInstanceOf(static::TEST_SUBJECT_CLASSNAME, $subject);
        $this->assertInstanceOf('Exception', $subject);
    }

    /**
     * Tests whether the instance can be thrown.
     *
     * @since [*next-version*]
     *
     * @throws EvaluationException
     */
    public function testCanBeThrown()
    {
        $subject = $this->createInstance('testing message', 15);

        $this->setExpectedException(static::TEST_SUBJECT_CLASSNAME, 'testing message', 15);

        throw $subject;
    }

    /**
     * Tests whether the instance can be caught.
     *
     * @since [*next-version*]
     */
    public function testCanBeCaught()
    {
        $previous = new \Exception('');
        $subject  = $this->createInstance('testing message', 8, $previous);

        try {
            throw $subject;
        } catch (Exception $ex) {
            $this->assertInstanceOf(static::TEST_SUBJECT_CLASSNAME, $ex);
            $this->assertEquals('testing message', $ex->getMessage(), 'Exception message is not valid.');
            $this->assertEquals(8, $ex->getCode(), 'Exception code is not valid.');
            $this->assertEquals($previous, $ex->getPrevious(), 'Previous exception is not valid');

            return;
        }

        $this->fail('Exception could not be caught');
    }
}
