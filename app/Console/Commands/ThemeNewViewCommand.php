<?php

namespace App\Console\Commands;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Console\ViewMakeCommand;
use Symfony\Component\Console\Input\InputOption;
use Fuzzy\Fzpkg\Traits\SelectThemeTrait;

class ThemeNewViewCommand extends ViewMakeCommand
{
    use SelectThemeTrait;

    protected $signature = 'make:view {name : The name of the view}';

    protected $description = 'Create a new theme\'s view';

    protected $type = 'View';

    private $themeName;

    public function __construct(Filesystem $files)
    {
        $this->themeName = null;

        parent::__construct($files);

        $this->getDefinition()->addOption(new InputOption('theme', null, InputOption::VALUE_REQUIRED, 'The theme name'));

        foreach ($this->getOptions() as $option) {
            $this->getDefinition()->addOption(new InputOption($option[0], $option[1], $option[2], $option[3], (isset($option[4]) ? $option[4] : null)));
        }
    }

    /**
     * Get the first view directory path from the application configuration.
     *
     * @param  string  $path
     * @return string
     */
    protected function viewPath($path = '')
    {
        return base_path('resources/' . $this->themeName . '/resources/views/' . $path);
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        if (!empty($this->option('theme'))) {
            if (!$this->files->isDirectory(base_path('resources/' . $this->option('theme')))) {
                $this->fail('Theme "' . $this->option('theme') . '" not exists');
            }
            else {
                $this->themeName = $this->option('theme');
            }
        }

        if (is_null($this->themeName)) {
            $this->themeName = $this->selectTheme();
        }

        parent::handle();
    }
}

