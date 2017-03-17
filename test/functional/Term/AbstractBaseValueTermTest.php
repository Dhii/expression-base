<?php

namespace Dhii\Expression\FuncTest\Term;

use Dhii\Expression\Term\AbstractBaseValueTerm;
use Exception;
use Xpmock\TestCase;

/**
 * Tests {@see Dhii\Expression\Term\AbstractBaseValueTerm}.
 *
 * @since [*next-version*]
 */
class AbstractBaseValueTermTest extends TestCase
{
    /**
     * The name of the test subject.
     *
     * @since [*next-version*]
     */
    const TEST_SUBJECT_CLASSNAME = 'Dhii\\Expression\\Term\\AbstractBaseValueTerm';

    /**
     * Creates a new instance of the test subject.
     *
     * @since [*next-version*]
     *
     * @return AbstractBaseValueTerm
     */
    public function createInstance()
    {
        $mock = $this->mock(static::TEST_SUBJECT_CLASSNAME)
            ->_evalValue(function($value, $ctx = null) {
                return $value;
            })
            ->_assertContextValid(function($ctx = null) {
                return true;
            })
            ->new();

        return $mock;
    }

    /**
     * Tests whether a valid instance of the test subject can be created.
     *
     * @since [*next-version*]
     */
    public function testCanBeCreated()
    {
        $subject = $this->createInstance();

        $this->assertInstanceOf(
            static::TEST_SUBJECT_CLASSNAME, $subject, 'Subject is not a valid instance.'
        );
    }

    /**
     * Tests the value getter.
     *
     * @since [*next-version*]
     */
    public function testGetValue()
    {
        $subject = $this->createInstance();

        $subject->this()->value = 'testing string!';

        $this->assertEquals('testing string!', $subject->getValue(), 'Subject returned an invalid value.');
    }

    /**
     * Tests the evaluation.
     *
     * @since [*next-version*]
     */
    public function testEvaluate()
    {
        $subject = $this->createInstance();
        $subject->this()->value = 21;

        $result = $subject->evaluate();

        $this->assertEquals(21, $result);
    }

    public function testCreateEvaluationException()
    {
        $subject = $this->createInstance();

        $message   = 'this is a test exception message';
        $code      = 9;
        $previous  = new Exception('a previous exception');
        $exception = $subject->this()->_createEvaluationException($message, $code, $previous);

        $this->assertInstanceof(
            'Dhii\\Evaluable\\EvaluationExceptionInterface',
            $exception,
            'Created exception is not a valid EvaluationExceptionInterface instance.'
        );
        $this->assertInstanceof(
            'Exception',
            $exception,
            'Created exception is not a valid Exception instance.'
        );
        $this->assertEquals($message, $exception->getMessage(), 'Invalid message for created exception.');
        $this->assertEquals($code, $exception->getCode(), 'Invalid code for created exception.');
        $this->assertEquals($previous, $exception->getPrevious(), 'Invalid previous exception for created exception');
    }
}
