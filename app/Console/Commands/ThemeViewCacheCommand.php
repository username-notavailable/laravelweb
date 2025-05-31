<?php

namespace App\Console\Commands;

use Illuminate\Foundation\Console\ViewCacheCommand;
use Illuminate\Support\Collection;
use Fuzzy\Fzpkg\FzpkgServiceProvider;

class ThemeViewCacheCommand extends ViewCacheCommand
{
    protected $signature = 'view:cache';

    protected $description = 'Compile all of the applications\'s theme\'s Blade templates';

    /**
     * Get all of the possible view paths.
     *
     * @return \Illuminate\Support\Collection
     */
    protected function paths()
    {
        $finder = $this->laravel['view']->getFinder();

        if (config('app.env') === 'production') {
            $themes = FzpkgServiceProvider::getEnabledThemes();
        }
        else {
            $themes = FzpkgServiceProvider::getAvailableThemes();
        }

        $paths = [];

        foreach ($themes as $themeName) {
            $path = resource_path($themeName . '/resources/views');

            if (file_exists($path)) {
                $paths[] = $path;
            }
        }

        $finder->setPaths($paths);

        return (new Collection($finder->getPaths()))->merge(
            (new Collection($finder->getHints()))->flatten()
        );
    }
}

