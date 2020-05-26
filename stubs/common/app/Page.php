<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use NickDeKruijk\Admin\Images;
use Illuminate\Support\Str;

class Page extends Model
{
    use Images;

    protected $casts = [
        'active' => 'boolean',
        'menuitem' => 'boolean',
        'home' => 'boolean',
        'date' => 'date',
    ];

    /**
     * If model is multilanguage you can define it here. PageController will use this to select the proper columns
     * For example:
     * public static $languages = [
     *     'nl' => '',     // Locale => database column suffix
     *     'en' => '_en',
     * ];
     */
    public static $languages;

    // If slug is empty create slug based on title
    public function getSlugAttribute($value)
    {
        // If slug is / then it's the 'root' so return empty slug
        if ($value == '/') {
            return '';
        }
        return $value ?: Str::slug($this->title);
    }

    // If empty set html_title based on title and APP_NAME
    public function getHtmlTitleAttribute($value)
    {
        return $value ?: $this->title . ' - ' . config('app.name');
    }

    // If empty set head based on title
    public function getHeadAttribute($value)
    {
        return $value ?: $this->title;
    }

    // Set default view for a page if left empty
    public function getViewAttribute($value)
    {
        return $value ?: 'page';
    }
}
