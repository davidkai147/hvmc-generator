<?php

namespace DummyNamespace\Providers;

use HMVCTools\Providers\AbstractModuleProvider;
use Illuminate\Support\Facades\Blade;
use DummyNamespace\Repositories\DummyNameRepository;
use DummyNamespace\Repositories\DummyNameRepositoryInterface;

class ModuleServiceProvider extends AbstractModuleProvider
{
    /**
     * @return string
     */
    public function getDir()
    {
        return __DIR__;
    }

    /**
     * @return string
     */
    public function getModuleName()
    {
        return 'DummyAlias';
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Blade::componentNamespace('DummyNamespace\\View\\Component', 'DummyAlias');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        parent::register();

        $this->app->register(RouteServiceProvider::class);
        $this->app->bind(DummyNameRepositoryInterface::class, DummyNameRepository::class);

        $this->loadTranslationsFrom($this->getDir() . '/../../resources/lang', $this->getModuleName());
    }
}
