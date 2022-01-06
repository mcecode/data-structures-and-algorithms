<?php

declare(strict_types=1);

spl_autoload_register(function (string $className): void {
  require_once __DIR__ .
    DIRECTORY_SEPARATOR .
    preg_replace("#\\\\#", DIRECTORY_SEPARATOR, $className) .
    ".php";
});

new Ciphers\CeasarCipherTest();

new LinkedLists\SinglyLinkedListNodeTest();
