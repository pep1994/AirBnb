<?php

namespace App\Providers;

use Braintree_Configuration;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

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

      \Braintree\Configuration::environment(env('BRAINTREE_ENV'));
      \Braintree\Configuration::merchantId(env('BRAINTREE_MERCHANT_ID'));
      \Braintree\Configuration::publicKey(env('BRAINTREE_PUBLIC_KEY'));
      \Braintree\Configuration::privateKey(env('BRAINTREE_PRIVATE_KEY'));

      Collection::macro('paginate', function($perPage, $total = null, $page = null, $pageName = 'page') {
          $page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);
          return new LengthAwarePaginator(
              $this->forPage($page, $perPage),
              $total ?: $this->count(),
              $perPage,
              $page,
              [
                  'path' => LengthAwarePaginator::resolveCurrentPath(),
                  'pageName' => $pageName,
              ]
          );
      });
    }
}
