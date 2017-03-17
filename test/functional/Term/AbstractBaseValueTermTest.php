<?php

namespace Dhii\Expression\FuncTest\Term;

use Dhii\Expression\Term\AbstractBaseValueTerm;
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
}
