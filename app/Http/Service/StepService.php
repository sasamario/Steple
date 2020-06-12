<?php

namespace App\Http\Service;

use App\Http\Requests\EditStepRequest;
use App\Http\Requests\StepRequest;
use App\Step;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


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

    /**
     * @return Array
     */
    public function readRankingStep(): Array
    {
        return Step::join('users', 'steps.user_id', '=', 'users.id')
            ->select(DB::raw('name, sum(steps) as totalSteps'))
            ->groupBy('user_id')
            ->orderBy('totalSteps', 'desc')
            ->limit(5)
            ->get()
            ->toArray();
    }

    /**
     * @param Request $request
     * @return Step
     */
    public function editStep(Request $request): Step
    {
        return Step::find($request->step_id);
    }

    /**
     * @param EditStepRequest $request
     */
    public function updateStep(EditStepRequest $request): void
    {
        Step::where('step_id', $request->step_id)
            ->update([
                'date' => $request->date,
                'steps' => $request->steps,
            ]);
    }

    /**
     * @param Request $request
     */
    public function deleteStep(Request $request): void
    {
        Step::where('step_id', $request->step_id)->where('user_id', Auth::id())->delete();
    }

    /**
     * @param string $orderBy
     * @return Builder
     */
    private function getSteps(string $orderBy): Builder
    {
        return Step::where('user_id', Auth::id())->orderBy('date', $orderBy);
    }

    /**
     * @return Collection
     */
    public function getRecentSteps(): Collection
    {
        return $this->getSteps('desc')->limit(7)->get();
    }

    /**
     * @param Request $request
     * @return Collection
     */
    public function getStepsBetween(Request $request): Collection
    {
        return $this->getSteps('asc')
            ->where('date', '>=',$request->from)
            ->where('date', '<=', $request->until)
            ->get();
    }

}