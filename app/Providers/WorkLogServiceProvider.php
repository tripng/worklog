<?php

namespace App\Providers;

use App\Services\Impl\WorkLogServiceImpl;
use App\Services\WorkLogService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class WorkLogServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        WorkLogService::class => WorkLogServiceImpl::class, 
    ];
    public function provides()
    {
        return [WorkLogService::class];
    }
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
