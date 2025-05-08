<?php

namespace DanieleMontecchi\LaravelUserstamps\Traits;

use Illuminate\Database\Eloquent\Relations\HasMany;

trait InteractsWithUserstamps
{
    public function createdModels(string $related, string $foreignKey = 'created_by'): HasMany
    {
        return $this->hasMany($related, $foreignKey);
    }

    public function updatedModels(string $related, string $foreignKey = 'updated_by'): HasMany
    {
        return $this->hasMany($related, $foreignKey);
    }

    public function deletedModels(string $related, string $foreignKey = 'deleted_by'): HasMany
    {
        return $this->hasMany($related, $foreignKey);
    }
}
