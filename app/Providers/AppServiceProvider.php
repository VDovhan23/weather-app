<?php

namespace App\Providers;

use App\System\Report\Repositories\ReportRepository;
use App\System\Report\Repositories\ReportRepositoryInterface;
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
