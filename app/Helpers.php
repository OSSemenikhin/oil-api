<?php
namespace App;

/**
 * Class Helpers
 *
 * @package App
 */
class Helpers
{
    /**
     * Logs data to a file
     *
     * @param mixed $data
     * @param string $dir The directory where the log file should be stored. Defaults to the current directory.
     * @param string $name The name of the log file. Defaults to 'log.txt'.
     */
    static function log(mixed $data, string $dir = __DIR__, string $name = '/log.txt'): void
    {
        if (!file_exists($dir)) mkdir($dir, 0755, true);
        file_put_contents($dir . $name, "==========================" . date('Y-m-d H:i:s') . "===================================" . PHP_EOL, FILE_APPEND);
        file_put_contents($dir . $name, print_r($data, true) . PHP_EOL, FILE_APPEND);
    }
}