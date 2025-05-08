<?php

namespace DanieleMontecchi\LaravelUserstamps\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasUserstamps
{
    protected static bool $userstampsEnabled = true;

    public static function bootHasUserstamps(): void
    {
        static::creating(function (Model $model) {
            if (self::$userstampsEnabled && auth()->check() && $model->isFillable('created_by')) {
                $model->created_by ??= auth()->id();
            }
        });

        static::updating(function (Model $model) {
            if (self::$userstampsEnabled && auth()->check() && $model->isFillable('updated_by')) {
                $model->updated_by = auth()->id();
            }
        });

        static::deleting(function (Model $model) {
            if (self::$userstampsEnabled && auth()->check() && $model->isFillable('deleted_by')) {
                $model->deleted_by = auth()->id();
                $model->save();
            }
        });

        static::restoring(function (Model $model) {
            if (self::$userstampsEnabled && $model->isFillable('deleted_by')) {
                $model->deleted_by = null;
            }
        });
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'created_by');
    }

    public function updater(): BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'updated_by');
    }

    public function destroyer(): BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'deleted_by');
    }

    public static function disableUserstamps(): void
    {
        self::$userstampsEnabled = false;
    }

    public static function enableUserstamps(): void
    {
        self::$userstampsEnabled = true;
    }

    public static function isUserstampsEnabled(): bool
    {
        return self::$userstampsEnabled;
    }
}
