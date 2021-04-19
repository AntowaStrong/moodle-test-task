<?php

namespace App\Services\MoodleService\Facades;

use App\Services\MoodleService\Moodle as MoodleService;
use Illuminate\Support\Facades\Facade;

class Moodle extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return MoodleService::class;
    }
}