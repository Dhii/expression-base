<?php

namespace Dhii\Expression\Context;

/**
 * Base implementation of a context that provides a map of preset context values.
 *
 * @since [*next-version*]
 */
abstract class AbstractBaseCompositeContext extends AbstractCompositeContext
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
     * Gets the context value associated with the given key.
     *
     * @since [*next-version*]
     *
     * @param string $key The key.
     *
     * @return mixed The value associated with the given key, or null if the key was not found.
     */
    public function getValueOf($key)
    {
        return $this->_getValueOf($key);
    }

    /**
     * Checks if the context has a value associated with a specific key.
     *
     * @since 0.1
     *
     * @param string $key The key.
     *
     * @return bool True if a value exists for the given key; false otherwise.
     */
    public function hasValue($key)
    {
        return $this->_hasValue($key);
    }

    /**
     * Sets the values or a single value.
     *
     * @since [*next-version*]
     *
     * @param string $key   The key of the value to set.
     * @param mixed  $value [optional] The value to set. Default: null
     *
     * @return $this This instance.
     */
    public function setValue($key, $value = null)
    {
        $this->_setValue($key, $value);

        return $this;
    }

    /**
     * Sets all of the context values, overwriting existing ones.
     *
     * @since [*next-version*]
     *
     * @param array $values An associative array of values.
     *
     * @return $this This instance.
     */
    public function setValues(array $values)
    {
        $this->_setValues($values);

        return $this;
    }

    /**
     * Removes a value.
     *
     * @since [*next-version*]
     *
     * @param string $key The key of the value to remove.
     *
     * @return $this This instance.
     */
    public function removeValue($key)
    {
        $this->_removeValue($key);

        return $this;
    }

    /**
     * Removes all the values from the context.
     *
     * @since [*next-version*]
     *
     * @return $this This instance.
     */
    public function clearValues()
    {
        $this->_clearValues();

        return $this;
    }
}
