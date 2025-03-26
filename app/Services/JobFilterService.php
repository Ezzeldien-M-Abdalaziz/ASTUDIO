<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\JobRepository;
use Illuminate\Database\Eloquent\Builder;

class JobFilterService
{
    protected $jobRepository;

    public function __construct(JobRepository $jobRepository)
    {
        $this->jobRepository = $jobRepository;
    }

    public function applyFilters(Request $request): Builder
    {
        return $this->jobRepository->getFilteredJobs($request);
    }
}
