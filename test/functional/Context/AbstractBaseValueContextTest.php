<?php

namespace Dhii\Expression\FuncTest\Context;

use Dhii\Expression\Context\AbstractBaseValueContext;
use Xpmock\TestCase;

/**
 * Tests {@see Dhii\Expression\Context\AbstractBaseValueContext}.
 *
 * @since [*next-version*]
 */
class AbstractBaseValueContextTest extends TestCase
{
    /**
     * The name of the test subject.
     *
     * @since [*next-version*]
     */
    const TEST_SUBJECT_CLASSNAME = 'Dhii\\Expression\\Context\\AbstractBaseValueContext';

    /**
     * Creates a new instance of the test subject.
     *
     * @since [*next-version*]
     *
     * @return AbstractBaseValueContext
     */
    public function createInstance()
    {
        $mock = $this->mock(static::TEST_SUBJECT_CLASSNAME)
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
     * Tests the value setter.
     *
     * @since [*next-version*]
     */
    public function testSetValue()
    {
        $subject = $this->createInstance();

        $subject->setValue('123');

        $this->assertEquals(123, $subject->this()->value, 'Subject did not set the correct value internally.');
    }
}
