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
        UiCommand::macro('preset-none', function ($command) {
            NonePreset::install();
            $command->info('All preset scaffolding removed successfully.');
        });
        UiCommand::macro('preset-sections', function ($command) {
            SectionsPreset::install();
            $command->info('Sections preset scaffolding installed successfully.');
        });
    }

    /**
     * Update the contents of a file with the logic of a given callback.
     */
    public static function updateFile(string $path, callable $callback)
    {
        $originalFileContents = file_get_contents($path);
        $newFileContents = $callback($originalFileContents);
        file_put_contents($path, $newFileContents);
    }
}
