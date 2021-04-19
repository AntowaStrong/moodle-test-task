<?php

namespace App\Services\MoodleService\Providers;

use App\Services\MoodleService\Moodle;
use Illuminate\Support\ServiceProvider;

class MoodleProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishConfig();
    }

    public function register(): void
    {
        $this->mergeConfig();
        $this->registerMoodleService();
    }

    public function publishConfig(): void
    {
        $this->publishes([$this->getConfigPath() => config_path('moodle.php')], 'config');
    }

    public function mergeConfig(): void
    {
        $this->mergeConfigFrom($this->getConfigPath(), 'moodle');
    }

    public function getConfigPath(): string
    {
        return __DIR__ . '/../Config/moodle.php';
    }

    public function registerMoodleService(): void
    {
        $this->app->singleton(Moodle::class, function () {
                return new Moodle(config('moodle'));
            }
        );

        $this->app->alias(Moodle::class, 'Moodle');
    }
}