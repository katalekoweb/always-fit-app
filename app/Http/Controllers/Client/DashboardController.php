<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function progress (Request $request) {
        $trains = $request->user()->trains()->orderByDesc('created_at')->get();
        return inertia('Client/Progress', compact('trains'));
    }
}
