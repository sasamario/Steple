<?php

namespace App\Http\Service;

use App\Http\Requests\StepRequest;
use App\Step;
use Illuminate\Support\Facades\Auth;


class StepService
{
    /**
     * @param StepRequest $request
     */
    public function addStep(StepRequest $request): void
    {
        Step::create([
            'steps' => $request->steps,
            'user_id' => Auth::id(),
            'date' => now(),
        ]);
    }
}