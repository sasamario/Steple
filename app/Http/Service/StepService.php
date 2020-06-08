<?php

namespace App\Http\Service;

use App\Http\Requests\StepRequest;
use App\Step;
use Illuminate\Pagination\LengthAwarePaginator;
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

    /**
     * @return LengthAwarePaginator
     */
    public function readStep(): LengthAwarePaginator
    {
        return Step::where('user_id', Auth::id())->orderBy('date', 'desc')->paginate(7);
    }

    /**
     * @return int
     */
    public function readTotalStep(): int
    {
        return Step::where('user_id', Auth::id())->get()->sum('steps');
    }
}