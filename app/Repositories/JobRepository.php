<?php

namespace App\Repositories;

use App\Models\Job;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class JobRepository
{
    public function getFilteredJobs(Request $request): Builder
    {
        $query = Job::query();

        $this->applyBasicFilters($query, $request);
        $this->applyRelationshipFilters($query, $request);
        $this->applyEavFilters($query, $request);

        return $query;
    }

    private function applyBasicFilters(Builder &$query, Request $request)
    {
        $filters = $request->query('filter', []);

        // Ensure filters are an array
        if (!is_array($filters)) {
            $filters = json_decode($filters, true) ?? [];
        }

        foreach ($filters as $field => $value) {
            if (in_array($field, ['title', 'description', 'company_name'])) {
                $query->where($field, 'LIKE', "%{$value}%");
            } elseif (in_array($field, ['salary_min', 'salary_max', 'published_at', 'created_at'])) {
                $this->applyComparison($query, $field, $value);
            } elseif (in_array($field, ['is_remote', 'status', 'job_type'])) {
                is_array($value) ? $query->whereIn($field, $value) : $query->where($field, $value);
            }
        }
    }

    private function applyComparison(Builder &$query, string $field, $value)
    {
        if (is_array($value) && count($value) === 2) {
            [$operator, $val] = $value;
            if (in_array($operator, ['=', '!=', '>', '<', '>=', '<='])) {
                $query->where($field, $operator, $val);
            }
        }
    }

    private function applyRelationshipFilters(Builder &$query, Request $request)
    {
        $relations = [
            'languages' => 'languages.name',
            'locations' => 'locations.city',
            'categories' => 'categories.name',
        ];

        foreach ($relations as $param => $column) {
            if ($values = $request->query($param)) {
                $query->whereHas($param, function ($q) use ($values, $column) {
                    $q->whereIn($column, is_array($values) ? $values : [$values]);
                });
            }
        }
    }

    private function applyEavFilters(Builder &$query, Request $request)
    {
        $eavFilters = $request->query('attribute', []);

        foreach ($eavFilters as $attributeName => $value) {
            $query->whereHas('attributes', function ($q) use ($attributeName, $value) {
                $q->whereHas('attribute', function ($subQuery) use ($attributeName) {
                    $subQuery->where('name', $attributeName);
                });

                if (is_array($value) && count($value) === 2) {
                    [$operator, $val] = $value;
                    $q->where('value', $operator, $val);
                } else {
                    $q->where('value', $value);
                }
            });
        }
    }
}
