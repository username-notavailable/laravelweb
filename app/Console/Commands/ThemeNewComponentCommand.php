<?php

namespace App\Console\Commands;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Console\ComponentMakeCommand;
use Symfony\Component\Console\Input\InputOption;
use Fuzzy\Fzpkg\Traits\SelectThemeTrait;

class ThemeNewComponentCommand extends ComponentMakeCommand
{
    use SelectThemeTrait;

    protected $signature = 'make:component {name : The name of the component}';

    protected $description = 'Create a new theme\'s view component class';

    protected $type = 'Component';

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
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return base_path('/stubs/fz/view-component.stub');
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

        if ($this->files->missing(base_path('stubs/fz'))) {
            $this->runCommand('fz:install:stubs', [], $this->output);
        }

        parent::handle();
    }
}

