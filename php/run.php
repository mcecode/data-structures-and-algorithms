<?php

declare(strict_types=1);

spl_autoload_register(function (string $class_name): void {
  require_once __DIR__ .
    DIRECTORY_SEPARATOR .
    preg_replace("#\\\\#", DIRECTORY_SEPARATOR, $class_name) .
    ".php";
});

new Ciphers\CeasarCipherTest();
