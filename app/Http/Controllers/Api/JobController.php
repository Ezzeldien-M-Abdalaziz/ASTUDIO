<?php

namespace App\Http\Controllers\Api;

use App\Services\JobFilterService;
use Illuminate\Http\Request;

class JobController
{
    protected $jobFilterService;

    public function __construct(JobFilterService $jobFilterService)
    {
        $this->jobFilterService = $jobFilterService;
    }

    public function index(Request $request)
    {
        $jobs = $this->jobFilterService->applyFilters($request)->get();
        $jobs = $this->jobFilterService->applyFilters($request)->get();
        return response()->json($jobs);
    }
}

