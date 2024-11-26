<?php

namespace App\Contracts\Utilities;

interface ExceptionLoggerInterface
{
    public function logException(\Exception $e, string $source, ?string $platform = null);
}
