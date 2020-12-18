<?php

declare(strict_types=1);

namespace NunoMaduro\Dig;

use NunoMaduro\Collision\ArgumentFormatter;
use NunoMaduro\Collision\Highlighter;
use NunoMaduro\Dig\Exceptions\CallerNotFoundException;
use NunoMaduro\Dig\Exceptions\OnlyConsoleSupportedException;
use const PHP_SAPI;
use Symfony\Component\Console\Output\ConsoleOutput;

/**
 * @internal
 */
final class Dig
{
    /**
     * Returns the function that invoked the current function, if any.
     */
    public function caller(): void
    {
        $trace = debug_backtrace();

        if (count($trace) < 2) {
            CallerNotFoundException::raise();
        }

        $output      = new ConsoleOutput();
        $highlighter = new Highlighter();

        if (!\in_array(PHP_SAPI, ['cli', 'phpdbg'], true)) {
            OnlyConsoleSupportedException::raise();
        }

        array_shift($trace);
        $caller = (array) array_shift($trace);

        $file = $this->getFileRelativePath($caller['file']);
        $line = $caller['line'];

        $arguments = new ArgumentFormatter();
        $args      = $arguments->format($caller['args']);

        $output->writeln([
            '',
            "  Caller at <fg=green>$file</>:<fg=green>$line</> with ($args)",
            $highlighter->highlight(
                (string) file_get_contents($file),
                $line
            ),
            '',
        ]);

        foreach ($trace as $i => $frame) {
            $file     = $this->getFileRelativePath($frame['file']);
            $line     = $frame['line'];
            $class    = $frame['class'] ?? '';
            $function = $frame['function'];
            $args     = $arguments->format($frame['args']);
            $pos      = str_pad((string) ((int) $i + 1), 4, ' ');

            $output->writeln([
                " <fg=yellow>$pos</><fg=default;options=bold>$file</>:<fg=default;options=bold>$line</>",
                " <fg=white>    $class$function($args)</>",
                '',
            ]);

            if ($i > 2) {
                break;
            }
        }

        exit(1);
    }

    /**
     * Returns the relative path of the given file path.
     */
    private function getFileRelativePath(string $filePath): string
    {
        $cwd = (string) getcwd();

        if (!empty($cwd)) {
            return str_replace("$cwd/", '', $filePath);
        }

        return $filePath;
    }
}
