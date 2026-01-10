<?php

declare(strict_types=1);

namespace JPI;

/**
 * Stores settings for the application.
 */
final class Config {

    protected array $values = [];

    public function __set(string $key, mixed $value): void {
        $this->values[$key] = $value;
    }

    public function __get(string $key): mixed {
        return $this->values[$key] ?? null;
    }
}
