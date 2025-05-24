<?php

namespace App\View\Components;

use Closure;
use Fuzzy\Fzpkg\Traits\JsonObjectTrait;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Fuzzy\Fzpkg\Classes\SweetApi\Classes\HtmxRequest;
use Fuzzy\Fzpkg\Traits\ViewContextTrait;

class NavBar extends Component
{
    use JsonObjectTrait;
    use ViewContextTrait;

    /**
     * Create a new component instance.
     */
    public function __construct(array $viewContext = [])
    {
        $this->initFromViewContext($viewContext, 'MAIN-NAV-BAR');
    }

    // --- HTMX

    public function getNavBarHtmx(HtmxRequest $request)
    {
        return view('components.commons.nav-bar');
    }

    // ---

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.commonms.nav-bar');
    }
}
