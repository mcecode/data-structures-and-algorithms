<?php

declare(strict_types=1);

namespace Tests\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_METHOD)]
class Todo extends Test
{
}
