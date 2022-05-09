<?php

namespace kirinthor\AppUi;

use kirinthor\AppUi\Actions\Minify;

class AppUiBladeDirectives
{
    public function scripts(bool $absolute = true): string
    {
        $route = route('appui.assets.scripts', $parameters = [], $absolute);
        $this->getManifestVersion('appui.js', $route);

        return <<<HTML
        <script>{$this->hooksScript()}</script>
        <script src="{$route}" defer></script>
        HTML;
    }

    public function hooksScript(): string
    {
        $scripts = <<<JS
            window.Appui = {
                hook(hook, callback) {
                    window.addEventListener(`appui:\${hook}`, () => callback())
                },
                dispatchHook(hook) {
                    window.dispatchEvent(new Event(`appui:\${hook}`))
                }
            }
        JS;

        return Minify::execute($scripts);
    }

    public function styles(bool $absolute = true): string
    {
        $route = route('appui.assets.styles', $parameters = [], $absolute);
        $this->getManifestVersion('appui.css', $route);

        return "<link href=\"{$route}\" rel=\"stylesheet\" type=\"text/css\">";
    }

    public function getManifestVersion(string $file, ?string &$route = null): ?string
    {
        $manifestPath = __DIR__ . '/../dist/mix-manifest.json';

        if (!file_exists($manifestPath)) {
            return null;
        }

        $manifest = json_decode(file_get_contents($manifestPath), $assoc = true);
        $version  = last(explode('=', $manifest["/{$file}"]));

        if ($route) {
            $route .= "?id={$version}";
        }

        return $version;
    }

    public function confirmAction(string $expression): string
    {
        return "onclick=\"window.\$appui.confirmAction($expression, '{{ \$_instance->id }}')\"";
    }

    public function notify(string $expression): string
    {
        return "onclick=\"window.\$appui.notify($expression, '{{ \$_instance->id }}')\"";
    }

    public function boolean(string $value): string
    {
        return "<?= json_encode(filter_var($value, FILTER_VALIDATE_BOOLEAN)); ?>";
    }
}
