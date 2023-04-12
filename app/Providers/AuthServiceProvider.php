<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Article;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Faq;
use App\Models\MenuItem;
use App\Policies\ArticlePolicy;
use App\Policies\BannerPolicy;
use App\Policies\CategoryPolicy;
use App\Policies\FaqPolicy;
use App\Policies\MenuItemPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Article::class => ArticlePolicy::class,
        Category::class => CategoryPolicy::class,
        MenuItem::class => MenuItemPolicy::class,
        Faq::class => FaqPolicy::class,
        Banner::class => BannerPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
