<?php

namespace App\Console\Commands;

use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Process\Process;
use Fuzzy\Fzpkg\FzpkgServiceProvider;
use Fuzzy\Fzpkg\Console\Commands\BaseCommand;

class ThemeRunCmdCommand extends BaseCommand
{
    protected $signature = 'theme:run:cmd { cmd : [dev|build] - "dev" = Run vite.js "server" - "build" = Run vite.js "build" } { --theme= : The theme name } { --hostname=127.0.0.1 : The hostname for "server" } { --port=8989 : The port number for "server" }';

    protected $description = 'Run "vite.js" for the theme';

    private $themeName;
    protected $files;

    public function __construct(Filesystem $files)
    {
        $this->themeName = null;
        $this->files = $files;

        parent::__construct();
    }

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
            if (config('app.env') === 'production') {
                $themes = FzpkgServiceProvider::getEnabledThemes();
            }
            else {
                $themes = FzpkgServiceProvider::getAvailableThemes();
            }

            if (count($themes) === 1) {
                $this->themeName = $themes[0];
            }
            else {
                $this->themeName = $this->choice('Theme selection?',
                    $themes,
                    0,
                    3
                );
            }
        }

        $hostname = $this->option('hostname');
        $port = $this->option('port');

        if ($this->argument('cmd') === 'build') {
            $command = ['cmd' => ['node', 'node_modules/vite/bin/vite.js', '--config=vite-theme.config.js', 'build'], 'env' => ['FZ_SELECTED_THEME' => $this->themeName, 'FZ_DEV_HOSTNAME' => $hostname, 'FZ_DEV_PORT' => $port]];
        }
        else if ($this->argument('cmd') === 'dev') {
            $command = ['cmd' => ['node', 'node_modules/vite/bin/vite.js', '--config=vite-theme.config.js'], 'env' => ['FZ_SELECTED_THEME' => $this->themeName, 'FZ_DEV_HOSTNAME' => $hostname, 'FZ_DEV_PORT' => $port]];
        }
        else {
            $this->fail('Command "' . $this->argument('cmd') . '" not exists');
        }

        if ((new Process($command['cmd'], base_path(), $command['env']))
            ->setTimeout(null)
            ->run(function ($type, $output) {
                $this->output->write($output);
            }) !== 0) {
                $this->outLabelledError('Run command "' . implode(' ', $command['cmd']) . '" on theme "' . $this->themeName . '" failed...');
        }
    }
}

