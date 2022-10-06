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
    $this->loadMigrationsFrom(__DIR__ . '/migrations');
    $this->loadViewsFrom(__DIR__ . '/views', 'todolist');
    $this->publishes([
      __DIR__ . '/views' => base_path('resources/views/Lionelprovider/todolist'),
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