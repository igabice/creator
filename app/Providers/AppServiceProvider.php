<?php

namespace App\Providers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    public function boot()
    {
        Schema::defaultStringLength(191);

        //URL::forceScheme('https');
//        Collection::macro('paginate', function($perPage, $total = null, $page = null, $pageName = 'page') {
//            $page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);
//
//            return new LengthAwarePaginator(
//                $this->forPage($page, $perPage),
//                $total ?: $this->count(),
//                $perPage,
//                $page,
//                [
//                    'path' => LengthAwarePaginator::resolveCurrentPath(),
//                    'pageName' => $pageName,
//                ]
//            );
//        });
    }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
