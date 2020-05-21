<?php

namespace NickDeKruijk\LaravelUIPresets;

use Illuminate\Filesystem\Filesystem;
use Laravel\Ui\Presets\Preset;

class SectionsPreset extends Preset
{
    public static function install()
    {
        NonePreset::install();

        $filesystem = new Filesystem();
        $filesystem->copyDirectory(__DIR__ . '/../stubs', base_path());
        $filesystem->copyDirectory(__DIR__ . '/../stubs/sections', base_path());

        PresetsServiceProvider::addPageControllerRoute();
    }
}
