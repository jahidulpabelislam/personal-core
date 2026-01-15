<?php

declare(strict_types=1);

namespace JPI;

/**
 * Stores settings for the application.
 */
final class Config {

    protected array $values = [];

    public function __construct(array $values = []) {
        foreach ($values as $key => $value) {
            $this->$key = $value;
        }
    }

    public function __set(string $key, self|array|string|float|int $value): void {
        if (is_array($value)) {
            $value = new self($value);
        }
        $this->values[$key] = $value;
    }

    public function __get(string $key): self|string|float|int|null {
        return $this->values[$key] ?? null;
    }
}
