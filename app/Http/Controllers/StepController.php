<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditStepRequest;
use App\Http\Requests\StepRequest;
use App\Http\Service\StepService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StepController extends Controller
{
    /**
     * @var StepService
     */
    private $stepService;

    public function __construct(StepService $stepService)
    {
        $this->stepService = $stepService;
        $this->middleware('auth');
    }

    /**
     * @param StepRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add(StepRequest $request)
    {
        $this->stepService->addStep($request);

        return redirect()->route('home');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $steps = $this->stepService->readStep();
        $totalSteps = $this->stepService->readTotalStep();
        $rankingSteps = $this->stepService->readRankingStep();

        return view('home', compact('steps', 'totalSteps', 'rankingSteps'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit(Request $request)
    {
        $editStep = $this->stepService->editStep($request);
        if ($editStep->user_id == Auth::id()) {
            return view('step.edit', compact('editStep'));
        } else {
            return redirect()->route('home');
        }
    }

    /**
     * @param EditStepRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EditStepRequest $request)
    {
        $this->stepService->updateStep($request);

        return redirect()->route('home');
    }
}
