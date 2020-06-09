<?php

namespace App\Http\Controllers;

use App\Http\Requests\StepRequest;
use App\Http\Service\StepService;

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
}
