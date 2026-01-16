<?php

declare(strict_types=1);

namespace JPI;

use JPI\Utils\Arrayable;

/**
 * Stores settings for the application.
 */
final class Config implements Arrayable {

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

    public function toArray(): array {
        $array = [];
        foreach ($this->values as $key => $value) {
            if ($value instanceof self) {
                $value = $value->toArray();
            }
            $array[$key] = $value;
        }

        return $array;
    }
}
