<?php

namespace NickDeKruijk\LaravelUIPresets;

use Illuminate\Filesystem\Filesystem;
use Laravel\Ui\Presets\Preset;

class SectionsPreset extends Preset
{
    public static function install()
    {
        $filesystem = new Filesystem();
        $filesystem->deleteDirectory(resource_path('sass'));
        $filesystem->copyDirectory(__DIR__ . '/../stubs', base_path());
    }
}
