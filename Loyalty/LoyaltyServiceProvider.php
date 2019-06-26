<?php
namespace Loyalty;

use App\Customer;
use Illuminate\Support\ServiceProvider;
/**
 * loyalty services
 */
class LoyaltyServiceProvider extends ServiceProvider;
{
    protected $defer = false;

    protected $namespace = 'Loyalty';

    public function boot()
    {
      $this->loadViewsFrom(__DIR__.'/../resources/views', 'loyalty');
    }

    public function register()
    {
        $this->loadRoutes();
        $this->loadViews();
        $this->loadMigrations();
    }

    protected function loadRoutes()
    {
       //
    }

    protected function loadViews()
    {
      //
    }

    protected function loadMigrations()
    {
      //
    }
}
