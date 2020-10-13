# laravel-ui-presets
Frontend presets for Laravel

## Warning
**Do not use this package in existing applications, it will delete css/sass/js resources, remove welcome view and change routes.**
Only use after a fresh laravel install.

## Installation

To install the presets in a fresh Laravel application, simply run the following command:

```bash
composer require nickdekruijk/laravel-ui-presets
```

Or for a more complete environment including admin and debugging tools you can run:

```bash
composer require nickdekruijk/laravel-ui-presets nickdekruijk/admin nickdekruijk/settings doctrine/dbal arcanedev/laravel-lang
composer require --dev barryvdh/laravel-debugbar
```

Then select one of the presets (preset-none is always ran before one of the other presets):

```bash
php artisan ui preset-none
php artisan ui preset-simple
php artisan ui preset-sections
```
