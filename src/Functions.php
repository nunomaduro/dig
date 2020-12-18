<?php

declare(strict_types=1);

use NunoMaduro\Dig\Dig;

if (!function_exists('dig')) {
    /**
     * Creates a Dig instance.
     *
     * @param mixed ...$args
     */
    function dig(...$args): Dig
    {
        if (count(func_get_args()) > 0) {
            dd(...$args);
        }

        return new Dig();
    }
}
