<?php

namespace Dhii\Expression\Context;

/**
 * Base class for a context that simply provides a preset context value.
 *
 * @since [*next-version*]
 */
abstract class AbstractBaseValueContext extends AbstractContext
{
    /**
     * Gets the context value.
     *
     * @since [*next-version*]
     *
     * @return mixed The context value.
     */
    public function getValue()
    {
        return $this->_getValue();
    }

    /**
     * Sets the context value.
     *
     * @since [*next-version*]
     *
     * @param mixed $value The new context value.
     *
     * @return $this This instance.
     */
    public function setValue($value)
    {
        $this->_setValue($value);

        return $this;
    }
}
