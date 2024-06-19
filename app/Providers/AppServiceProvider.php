<?php

namespace App\Providers;

use App\Repositories\Contracts\LearnerRepositoryContract;
use App\Repositories\Contracts\SearchableEventRepositoryContract;
use App\Repositories\LearnerRepository;
use App\Repositories\SearchableEventRepository;
use App\Services\AuthService;
use App\Services\ConsultationService;
use App\Services\Contracts\AuthServiceContract;
use App\Services\Contracts\ConsultationServiceContract;
use App\Services\Contracts\SearchableEventServiceContract;
use App\Services\SearchableEventService;
use Illuminate\Database\SQLiteConnection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use App\Services\Contracts\LearnerServiceContract;
use App\Services\Contracts\ScormServiceContract;
use App\Services\LearnerService;
use App\Services\ScormService;

class AppServiceProvider extends ServiceProvider
{
    public const SERVICES = [
        AuthServiceContract::class => AuthService::class,
        LearnerServiceContract::class => LearnerService::class,
        SearchableEventServiceContract::class => SearchableEventService::class,
        ConsultationServiceContract::class => ConsultationService::class,
        ScormServiceContract::class => ScormService::class,
    ];

    public const REPOSITORIES = [
        LearnerRepositoryContract::class => LearnerRepository::class,
        SearchableEventRepositoryContract::class => SearchableEventRepository::class,
    ];

    public $singletons = self::SERVICES + self::REPOSITORIES;

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(\L5Swagger\L5SwaggerServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (strpos(config('app.url'), 'https') !== false) {
            \URL::forceScheme('https');
        }
        if (DB::Connection() instanceof SQLiteConnection) {
            DB::connection()->getPdo()->sqliteCreateFunction('REGEXP', function ($pattern, $value) {
                mb_regex_encoding('UTF-8');
                return (false !== mb_ereg($pattern, $value)) ? 1 : 0;
            });
        }
    }
}
