<?php

namespace NickDeKruijk\LaravelUIPresets;

use Laravel\Ui\UiCommand;
use Illuminate\Support\ServiceProvider;

class PresetsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        UiCommand::macro('preset-sections', function ($command) {
            SectionsPreset::install();
            $command->info('Sections preset scaffolding installed successfully.');
        });
    }
}
