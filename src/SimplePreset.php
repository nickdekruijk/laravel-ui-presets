<?php

namespace NickDeKruijk\LaravelUIPresets;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Composer;
use Laravel\Ui\Presets\Preset;

class SimplePreset extends Preset
{
    public static function install()
    {
        NonePreset::install();

        $filesystem = new Filesystem();
        $filesystem->copyDirectory(__DIR__ . '/../stubs/common', base_path());
        $filesystem->copyDirectory(__DIR__ . '/../stubs/simple', base_path());

        $composer = new Composer($filesystem);
        $composer->dumpAutoloads();

        PresetsServiceProvider::addPageControllerRoute();
    }
}
