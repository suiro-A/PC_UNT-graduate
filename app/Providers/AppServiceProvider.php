<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Proposal;
use App\Models\Request;
use App\Policies\ProposalPolicy;
use App\Policies\RequestPolicy;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(Proposal::class, ProposalPolicy::class);
        Gate::policy(Request::class, RequestPolicy::class);
    }
}
