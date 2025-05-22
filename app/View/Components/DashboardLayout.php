<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Fuzzy\Fzpkg\Traits\JsonObjectTrait;
use Closure;
use Illuminate\Contracts\View\View;
use Fuzzy\Fzpkg\Traits\ViewContextTrait;

class DashboardLayout extends Component
{
    use JsonObjectTrait;
    use ViewContextTrait;

    public string $dashboardTitle = '';
    public string $dashboardSubTitle = '';
    public array $breadcrumbLinks = [];

    /**
     * Create a new component instance.
     */
    public function __construct(array $viewContext = [])
    {
        $this->dashboardTitle = __('Dashboard');

        $this->initFromViewContext($viewContext, 'PAGE-LAYOUT');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layouts.dashboard-layout');
    }
}
