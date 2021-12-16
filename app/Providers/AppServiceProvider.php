<?php

namespace App\Providers;

use App\Repositories\Report\ReportRepository;
use App\Repositories\Report\ReportRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(ReportRepositoryInterface::class, ReportRepository::class);
    }
}
