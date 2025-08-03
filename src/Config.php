<?php

declare(strict_types=1);

namespace JPI;

/**
 * Stores settings for the application.
 */

final class Config {

    use \JPI\Utils\Singleton;

    protected array $values = [];

    protected function __construct() {
        $config = $this;

        $environment = App::get()->getEnvironment();

        include_once APP_ROOT . "/assets/config.php";

        if (file_exists(APP_ROOT . "/assets/config.local.php")) {
            include_once APP_ROOT . "/assets/config.local.php";
        }
    }

    public function __set(string $key, $value): void {
        $this->values[$key] = $value;
    }

    public function __get(string $key) {
        return $this->values[$key] ?? null;
    }
}
