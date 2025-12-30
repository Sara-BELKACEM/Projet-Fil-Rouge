<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Project;
use App\Policies\ProjectPolicy;
use App\Models\Product;
use App\Policies\ProductPolicy;
use App\Models\Order;
use App\Policies\OrderPolicy;
use App\Models\Category;
use App\Policies\CategoryPolicy;    
use App\Models\Message;
use App\Policies\MessagePolicy;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Project::class => ProjectPolicy::class,
        Product::class => ProductPolicy::class,
        Order::class => OrderPolicy::class,
        Category::class => CategoryPolicy::class,
        Message::class => MessagePolicy::class,

    ];


    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        //
    }
}
