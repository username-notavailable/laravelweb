<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Fuzzy\Fzpkg\Traits\JsonObjectTrait;
use Closure;
use Illuminate\Contracts\View\View;
use Fuzzy\Fzpkg\Traits\ViewContextTrait;

class MainLayout extends Component
{
    use JsonObjectTrait;
    use ViewContextTrait;

    public bool $includeMetaEnv = true;
    public bool $includeFavicon = true;
    public bool $includeAppCss = true;
    public bool $includeAppJs = true;
    public bool $includeJsTranslations = true;

    public string $pageMetas = '';
    public string $pageCss = '';
    public string $pageInlineCss = '';
    public string $pageJs = '';
    public string $pageInlineJs = '';

    public bool $useLoadingWaitSpinner = true;
    public bool $dumpSession = true;
    public bool $runInitJsApp = true;

    public string $title = '';
    public string $bodyClasses = '';
    public string $bodyStyle = '';

    public function __construct(array $viewContext = [])
    {
        $this->initFromViewContext($viewContext, 'MAIN-LAYOUT');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layouts.main-layout');
    }
}
