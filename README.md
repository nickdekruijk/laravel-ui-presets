# laravel-ui-presets
Frontend presets for Laravel

## Disclaimer
**Do not use this package in existing applications, it will delete css/sass/js resources, remove welcome view and change routes.**
Only use after a fresh laravel install.

This package uses semantic versioning so just running composer update won't break your application but installing a preset may function very different from previous minor versions so use with caution.

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
