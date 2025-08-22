<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Train;
use App\Models\TrainLog;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
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
}
