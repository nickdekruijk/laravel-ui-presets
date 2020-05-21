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
        UiCommand::macro('preset-simple', function ($command) {
            SimplePreset::install();
            $command->info('Simple preset scaffolding installed successfully.');
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

    /**
     * Add route for Pagecontroller if needed
     */
    public static function addPageControllerRoute()
    {
        self::updateFile(base_path('routes/web.php'), function ($file) {
            $route = "Route::get('{any}', 'PageController@route')->where('any', '(.*)');\n";
            if (strpos($file, $route) === false) {
                return $file .= $route;
            } else {
                return $file;
            }
        });
    }
}
