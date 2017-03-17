<?php

namespace Dhii\Expression\FuncTest\Context;

use Dhii\Expression\Context\AbstractBaseCompositeContext;
use Xpmock\TestCase;

/**
 * Tests {@see Dhii\Expression\Context\AbstractBaseCompositeContext}.
 *
 * @since [*next-version*]
 */
class AbstractBaseCompositeContextTest extends TestCase
{
    /**
     * The name of the test subject.
     *
     * @since [*next-version*]
     */
    const TEST_SUBJECT_CLASSNAME = 'Dhii\\Expression\\Context\\AbstractBaseCompositeContext';

    /**
     * Creates a new instance of the test subject.
     *
     * @since [*next-version*]
     *
     * @return AbstractBaseCompositeContext
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
     * Tests the value-by-index getter.
     *
     * @since [*next-version*]
     */
    public function testGetValueOf()
    {
        $subject = $this->createInstance();

        $subject->this()->value = array(
            'string'  => 'testing string!',
            1 => 123456
        );

        $this->assertEquals('testing string!', $subject->getValueOf('string'), 'Subject returned an invalid value for the "string" index.');
        $this->assertEquals(123456, $subject->getValueOf(1), 'Subject returned an invalid value for the numeral "1" index.');
        $this->assertNull($subject->getValueOf('foobar'), 'Subject did not return null for a non-existing index');
    }

    /**
     * Tests the value-by-index checker method.
     *
     * @since [*next-version*]
     */
    public function testHasValue()
    {
        $subject = $this->createInstance();

        $subject->this()->value = array(
            'string'  => 'testing string!',
            1 => 123456
        );

        $this->assertTrue($subject->hasValue('string'), 'Subject did not return true for index "string".');
        $this->assertTrue($subject->hasValue(1), 'Subject did not return true for numeral index "1".');
        $this->assertFalse($subject->hasValue('foobar'), 'Subject did not return false for a non-existing index.');
    }

    /**
     * Tests the value setter.
     *
     * @since [*next-version*]
     */
    public function testSetValue()
    {
        $subject = $this->createInstance();

        $subject->setValue(5);

        $this->assertEquals(array(
            5 => null
        ), $subject->this()->value, 'Subject did not correctly set the numeral index "5" internally.');

        $subject->setValue('test', 'foobar');

        $this->assertEquals(array(
            5      => null,
            'test' => 'foobar'
        ), $subject->this()->value, 'Subject did not correctly set the numeral index "5" internally.');
    }

    /**
     * Tests the multiple value setter.
     *
     * @since [*next-version*]
     */
    public function testSetValues()
    {
        $subject = $this->createInstance();

        $subject->this()->value = array(
            'some' => 'pre-existing values',
            'test' => 123456
        );

        $subject->setValues(array(
            5      => null,
            'test' => 'foobar'
        ));

        $this->assertEquals(array(
            5      => null,
            'test' => 'foobar'
        ), $subject->this()->value, 'Subject did not correctly set the values internally.');
    }

    /**
     * Tests the value removal method.
     *
     * @since [*next-version*]
     */
    public function testRemoveValue()
    {
        $subject = $this->createInstance();

        $values = array(
            0      => 'zero',
            1      => 'one',
            'some' => 'pre-existing values',
            'test' => 123456,
            2      => 'two',
            3      => 'three'
        );

        $subject->this()->value = $values;

        $subject->removeValue('some');

        $expected = $values;
        unset($expected['some']);

        $this->assertEquals($expected, $subject->this()->value, 'Subject failed to correctly update the internal values after removal.');
        $this->assertArrayNotHasKey('some', $subject->this()->value, 'Subject failed to remove the value.');
    }

    /**
     * Tests the value removal method.
     *
     * @since [*next-version*]
     */
    public function testClearValues()
    {
        $subject = $this->createInstance();

        $values = array(
            0      => 'zero',
            1      => 'one',
            'some' => 'pre-existing values',
            'test' => 123456,
            2      => 'two',
            3      => 'three'
        );

        $subject->this()->value = $values;

        $subject->clearValues();

        $this->assertEmpty($subject->this()->value, 'Subject failed to clear the values.');
    }
}
