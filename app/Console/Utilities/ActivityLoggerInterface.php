<?php

namespace App\Contracts\Utilities;

interface ActivityLoggerInterface
{
    public function logActivity($model, $name, $id, $data, $des);
}
