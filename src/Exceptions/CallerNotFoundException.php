<?php

declare(strict_types=1);

namespace NunoMaduro\Dig\Exceptions;

use RuntimeException;

/**
 * @internal
 */
final class CallerNotFoundException extends RuntimeException
{
    /**
     * Raise a new CallerNotFoundException.
     */
    public static function raise(): void
    {
        throw new self('Caller not found.');
    }
}
