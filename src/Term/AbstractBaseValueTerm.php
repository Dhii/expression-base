<?php

namespace Dhii\Expression\Term;

use Dhii\Data\ValueAwareInterface;
use Dhii\Evaluable\EvaluableInterface;
use Dhii\Expression\Exception\EvaluationException;
use Exception;

/**
 * Base functionality for a value term.
 *
 * @since [*next-version*]
 */
abstract class AbstractBaseValueTerm extends AbstractValueTerm implements EvaluableInterface, ValueAwareInterface
{
    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function getValue()
    {
        return $this->_getValue();
    }

    /**
     * Sets the term value.
     *
     * @since [*next-version*]
     *
     * @param mixed $value The new term value.
     *
     * @return $this This instance.
     */
    public function setValue($value)
    {
        $this->_setValue($value);

        return $this;
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function evaluate(ValueAwareInterface $ctx = null)
    {
        return $this->_evaluate($ctx);
    }

    /**
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    protected function _createEvaluationException($message, $code = 1, Exception $previous = null)
    {
        return new EvaluationException($message, $code, $previous);
    }
}
