<?php

namespace Qskousen\CalculatedField;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;

class FieldServiceProvider extends ServiceProvider {
	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot() {
		Nova::serving(function (ServingNova $event) {
			Nova::script('calculated-field', __DIR__ . '/../dist/js/field.js');
			Nova::style('calculated-field', __DIR__ . '/../dist/css/field.css');
		});
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register() {
		if ($this->app->routesAreCached()) {
			return;
		}

		Route::middleware(['nova'])
			->namespace('Qskousen\CalculatedField\Http\Controllers')
			->prefix('qskousen/calculated-field')
			->group(__DIR__ . '/../routes/api.php');
	}
}
