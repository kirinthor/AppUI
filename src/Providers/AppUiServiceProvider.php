<?php

namespace kirinthor\AppUi\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\{ServiceProvider, Str, Stringable};
use Illuminate\View\Compilers\BladeCompiler;
use kirinthor\AppUi\Facades\{AppUiComponent, AppUiDirectives};
use kirinthor\AppUi\Mixins\Stringable\UnlessMixin;
use kirinthor\AppUi\Support\AppUiTagCompiler;

class AppUiServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerViews();
        $this->registerBladeDirectives();
        $this->registerBladeComponents();
        $this->registerTagCompiler();
        $this->registerMixins();
    }

    public function register()
    {
        $this->app->singleton('AppUiComponent', AppUiComponent::class);
        $loader = AliasLoader::getInstance();
        $loader->alias('AppUiComponent', AppUiComponent::class);
    }

    protected function registerTagCompiler()
    {
        if (method_exists($this->app['blade.compiler'], 'precompiler')) {
            $this->app['blade.compiler']->precompiler(function ($string) {
                return app(AppUiTagCompiler::class)->compile($string);
            });
        }
    }

    protected function registerViews(): void
    {
        $rootDir = __DIR__ . '/../..';

        $this->loadViewsFrom("{$rootDir}/resources/views", 'appui');
        $this->loadTranslationsFrom("{$rootDir}/src/lang", 'appui');
        $this->mergeConfigFrom("{$rootDir}/config/appui.php", 'appui');

        $this->publishes([
            "{$rootDir}/config/appui.php" => config_path('appui.php'),
        ], 'appui.config');

        $this->publishes([
            "{$rootDir}/resources/views" => resource_path('views/vendor/appui'),
        ], 'appui.resources');

        if (is_dir(resource_path('lang'))) {
            $this->publishes([
                "{$rootDir}/resources/lang" => resource_path('lang/vendor/appui'),
            ], 'appui.lang');
        }

        if (is_dir(base_path('lang'))) {
            $this->publishes([
                "{$rootDir}/src/lang" => $this->app->langPath('vendor/appui'),
            ], 'appui.lang');
        }
    }

    protected function registerBladeDirectives(): void
    {
        Blade::directive('confirmAction', fn (string $expression) => AppUiDirectives::confirmAction($expression));
        Blade::directive('notify', fn (string $expression) => AppUiDirectives::notify($expression));
        Blade::directive('boolean', fn ($value) => AppUiDirectives::boolean($value));
    }

    protected function registerBladeComponents(): void
    {
        $this->callAfterResolving(BladeCompiler::class, function (BladeCompiler $blade) {
            foreach (config('appui.components') as $component) {
                $blade->component($component['class'], $component['alias']);
            }
        });
    }

    protected function registerMixins()
    {
        if (!Stringable::hasMacro('unless')) {
            Stringable::macro('unless', app(UnlessMixin::class)());
        }
    }
}
