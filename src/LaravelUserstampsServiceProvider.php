<?php

namespace DanieleMontecchi\LaravelUserstamps;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\ServiceProvider;

class LaravelUserstampsServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Blueprint::macro('userstamps', function () {
            /** @var Blueprint $this */
            $this->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $this->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();
        });

        Blueprint::macro('softDeletesBy', function ($column = 'deleted_by') {
            /** @var Blueprint $this */
            $this->foreignId($column)->nullable()->constrained('users')->nullOnDelete();
        });
    }

    public function register(): void
    {
        //
    }
}
