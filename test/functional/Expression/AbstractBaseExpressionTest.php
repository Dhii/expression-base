<?php

namespace Dhii\Expression\Expression\Test\Expression;

use Dhii\Evaluable\EvaluableInterface;
use Dhii\Expression\AbstractBaseExpression;
use Xpmock\TestCase;

/**
 * Tests {@see \Dhii\Expression\Expression\AbstractBaseExpression}.
 *
 * @since [*next-version*]
 */
class AbstractBaseExpressionTest extends TestCase
{
    /**
     * The class name of the test subject.
     *
     * @since [*next-version*]
     */
    const TEST_SUBJECT_CLASSNAME = 'Dhii\\Expression\\Expression\\AbstractBaseExpression';

    /**
     * Creates a new instance of the test subject for testing.
     *
     * @since [*next-version*]
     *
     * @param array $terms [optional] An array of expression terms. Default: array()
     *
     * @return AbstractBaseExpression The new testing instance.
     */
    public function createInstance(array $terms = array())
    {
        $mock = $this->mock(static::TEST_SUBJECT_CLASSNAME)
            ->evaluate(0) // return value does not matter
            ->new();

        $mock->this()->terms = $terms;

        return $mock;
    }

    /**
     * Creates a mock expression term for testing purposes.
     *
     * @since [*next-version*]
     *
     * @param mixed $return [optional] The value the term evaluates to. Default: null
     *
     * @return EvaluableInterface The new mocked term instance.
     */
    public function mockEvaluable($return = null)
    {
        return $this->mock('Dhii\\Evaluable\\EvaluableInterface')
            ->evaluate($return)
            ->new();
    }

    /**
     * Tests whether a valid instance of a the test subject can be created.
     *
     * @since [*next-version*]
     */
    public function testCanBeCreated()
    {
        $subject = $this->createInstance();

        $this->assertInstanceOf(static::TEST_SUBJECT_CLASSNAME, $subject, 'Subject instance is not valid.');
        $this->assertInstanceOf('Dhii\\Expression\\Expression\\AbstractExpression', $subject, 'Subject instance is not valid.');
    }

    /**
     * Tests whether terms are correctly added to the expression.
     *
     * @since [*next-version*]
     */
    public function testAddTerm()
    {
        $subject = $this->createInstance();

        $term = $this->mockEvaluable();
        $subject->addTerm($term);

        $this->assertEquals(array($term), $subject->this()->terms);
    }

    /**
     * Tests whether terms are correctly removed from the expression.
     *
     * @since [*next-version*]
     */
    public function testRemoveTerm()
    {
        $subject = $this->createInstance();

        $terms = array(
            $this->mockEvaluable(),
            $this->mockEvaluable(),
            $this->mockEvaluable(),
        );

        $subject->this()->terms = $terms;

        $subject->removeTerm(1);
        unset($terms[1]);
        $expected = array_values($terms);

        $this->assertEquals($expected, $subject->this()->terms);
    }

    /**
     * Tests whether terms are correctly set to the expression.
     *
     * @since [*next-version*]
     */
    public function testSetTerms()
    {
        $subject = $this->createInstance();

        $terms = array(
            $this->mockEvaluable(),
            $this->mockEvaluable(),
            $this->mockEvaluable(),
        );

        $subject->setTerms($terms);

        $this->assertEquals($terms, $subject->this()->terms);
    }

    /**
     * Tests whether existing terms are correctly overwritten when new terms are set.
     *
     * @since [*next-version*]
     */
    public function testSetTermsWithExistingTerms()
    {
        $subject = $this->createInstance();

        $subject->this()->terms = array($this->mockEvaluable());

        $terms = array(
            $this->mockEvaluable(),
            $this->mockEvaluable(),
            $this->mockEvaluable(),
        );

        $subject->setTerms($terms);

        $this->assertEquals($terms, $subject->this()->terms);
    }
}