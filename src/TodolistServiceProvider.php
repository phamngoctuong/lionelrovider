<?php
namespace Lionelprovider\Todolist;
use Illuminate\Support\ServiceProvider;
class TodolistServiceProvider extends ServiceProvider {
  /**
   * Bootstrap services.
   *
   * @return void
   */
  public function boot() {
    $this->loadRoutesFrom(__DIR__ . '/routes.php');
    // $this->loadMigrationsFrom(__DIR__ . '/migrations'); //  😒 Use direct in extension
    $this->loadViewsFrom(__DIR__ . '/views', 'todolist'); // 😒 Use direct in extension
    $this->publishes([
      __DIR__ . '/views'      => base_path('resources/views/vendor/todolist'), // ✌️ Don't use it directly in extended, copy file to folder
      // __DIR__ . '/views'      => resource_path('resources/views/vendor/todolist'), // ✌️ Don't use it directly in extended, copy file to folder
      __DIR__ . '/routes.php' => base_path('routes/web.php'), // ✌️ Don't use it directly in extended, copy file to folder
      __DIR__ . '/config.php' => config_path('modules.php'), // ✌️ Don't use it directly in extended, copy file to folder
      __DIR__ . '/migrations' => base_path('database/migrations'), // ✌️ Don't use it directly in extended, copy file to folder
    ]);
  }
  /**
   * Register services.
   *
   * @return void
   */
  public function register() {
    $this->app->make('Lionelprovider\Todolist\TaskController');
  }
  /**
   * Run this code
   *
   * php artisan vendor:publish --provider="Lionelprovider\\Todolist\\TodolistServiceProvider"
   */
}