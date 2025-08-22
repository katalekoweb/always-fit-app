<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Train;
use App\Models\TrainLog;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $total_week_trains = $request->user()->trains()->count();
        $days_of_week = 5;
        $total_week_trains = $total_week_trains * $days_of_week;

        $total_week_trained = TrainLog::whereHas('train', function ($query) use ($request) {
            $query->where('user_id', $request->user()->id)
                ->whereDate('created_at', '>=', now()->startOfWeek())
                ->whereDate('created_at', '<=', now()->endOfWeek());
        })->count();

        $total_available_trains = Train::where('user_id', $request->user()->id)
            ->whereDoesntHave('logs', function ($query) {
                $query->whereDate('log_at', '>=', now()->startOfDay())
                ->whereDate('log_at', '<=', now()->startOfDay());;
            })
            ->count();

        $total_remaining_trains = $total_week_trains - ($total_available_trains + $total_week_trained);

        $stats = [
            'total_week_trained' => $total_week_trained,
            'total_available_trains' => $total_available_trains,
            'total_remaining_trains' => $total_remaining_trains
        ];

        return inertia('Client/Dashboard', compact('stats'));
    }

    public function progress(Request $request)
    {
        $trains = $request->user()->trains()->orderByDesc('created_at')->get();
        return inertia('Client/Progress', compact('trains'));
    }

    public function trains(Request $request)
    {
        $trains = $request->user()->trains()->orderByDesc('created_at')->get();
        return inertia('Client/Trains', compact('trains'));
    }

    public function saveTrain(Request $request, int $trainId)
    {
        $train = Train::whereUserId($request->user()?->id)->whereid($trainId)->firstOrFail();
        $today_log = $train->logs()->whereDate('created_at', now())->first();

        if ($today_log) {
            // delete train
            $today_log->delete();

            if ($train->current > 0) {
                $train->decrement('current');
                $train->save();
            }
        } else {
            TrainLog::query()->create(['train_id' => $trainId]);
            $train->increment('current');
            $train->save();
        }

        return redirect()->route('client.trains');
    }

    public function meals(Request $request)
    {
        $meals = $request->user()->meals()->orderByDesc('created_at')->get();
        return inertia('Client/Meals', compact('meals'));
    }
}
