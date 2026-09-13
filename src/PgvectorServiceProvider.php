<?php

namespace Seotarek\Pgvector;

use Illuminate\Support\ServiceProvider;

class PgvectorServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Register pgvector bindings
    }

    public function boot(): void
    {
        // Boot migrations or custom schema macros if needed
    }
}
