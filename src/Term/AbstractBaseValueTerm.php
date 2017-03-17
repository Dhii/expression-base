<?php

namespace Dhii\Expression\Term;

use Dhii\Data\ValueAwareInterface;
use Dhii\Evaluable\EvaluableInterface;

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
     * {@inheritdoc}
     *
     * @since [*next-version*]
     */
    public function evaluate(ValueAwareInterface $ctx = null)
    {
        return $this->_evaluate($ctx);
    }
}
