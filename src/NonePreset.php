<?php

namespace NickDeKruijk\LaravelUIPresets;

use Illuminate\Filesystem\Filesystem;
use Laravel\Ui\Presets\Preset;

class NonePreset extends Preset
{
    public static function install()
    {
        $filesystem = new Filesystem();

        // Delete css directory
        $filesystem->deleteDirectory(resource_path('css'));

        // Empty sass directory
        $filesystem->deleteDirectory(resource_path('sass'));
        $filesystem->makeDirectory(resource_path('sass'));

        // Empty js directory
        $filesystem->deleteDirectory(resource_path('js'));
        $filesystem->makeDirectory(resource_path('js'));

        // Delete Laravel default welcome view
        $filesystem->delete(resource_path('views/welcome.blade.php'));

        // Delete Laravel default welcome route
        PresetsServiceProvider::updateFile(base_path('routes/web.php'), function ($file) {
            return str_replace("Route::get('/', function () {\n    return view('welcome');\n});\n", "", $file);
        });
    }
}
