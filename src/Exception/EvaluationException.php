<?php

namespace Dhii\Expression\Exception;

use Dhii\Evaluable\EvaluationExceptionInterface;
use Symfony\Component\Config\Definition\Exception\Exception;

/**
 * An exception thrown during expression evaluation, when a problem is encountered.
 *
 * @since [*next-version*]
 */
class EvaluationException extends Exception implements EvaluationExceptionInterface
{
}
