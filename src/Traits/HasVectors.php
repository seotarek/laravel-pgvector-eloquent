<?php

namespace Seotarek\Pgvector\Traits;

use Illuminate\Database\Eloquent\Builder;

trait HasVectors
{
    /**
     * Scope query to order by Cosine Distance (<=>)
     */
    public function scopeOrderByCosineDistance(Builder $query, string $column, array $embedding, string $direction = 'asc'): Builder
    {
        $vectorStr = '[' . implode(',', $embedding) . ']';
        return $query->orderByRaw("{$column} <=> ? {$direction}", [$vectorStr]);
    }

    /**
     * Scope query to order by Euclidean / L2 Distance (<->)
     */
    public function scopeOrderByL2Distance(Builder $query, string $column, array $embedding, string $direction = 'asc'): Builder
    {
        $vectorStr = '[' . implode(',', $embedding) . ']';
        return $query->orderByRaw("{$column} <-> ? {$direction}", [$vectorStr]);
    }

    /**
     * Scope query to find K-nearest neighbors
     */
    public function scopeWhereNearest(Builder $query, string $column, array $embedding, int $limit = 5): Builder
    {
        return $this->scopeOrderByCosineDistance($query, $column, $embedding, 'asc')->limit($limit);
    }
}
