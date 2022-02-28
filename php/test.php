<?php

declare(strict_types=1);

spl_autoload_register(function (string $className): void {
  require_once __DIR__ .
    DIRECTORY_SEPARATOR .
    preg_replace("#\\\\#", DIRECTORY_SEPARATOR, $className) .
    ".php";
});

foreach (new DirectoryIterator("Tests") as $path) {
  if ($path->isFile() && str_ends_with($path->getPathname(), "Test.php")) {
    require_once $path->getPathname();
    new ("Tests\\" . $path->getBasename(".php"))();
  }
}
