<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TrainRequest;
use App\Models\Train;
use App\Models\User;
use Illuminate\Http\Request;

class TrainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trains = Train::whereActive(1)->with('user')->orderBy('created_at', 'desc')->paginate();
        return inertia('Admin/Trains/Index', compact('trains'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('is_admin', false)->select('name', 'id')->get();
        $train = new Train();
        $train->start_date = date('Y-m-d');

        return inertia('Admin/Trains/Form', compact('users', 'train'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TrainRequest $request)
    {
        $validated = $request->validated();
        Train::create($validated);

        return redirect()->route('admin.trains.index')->with('success', 'Treino criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Train $train)
    {
        $users = User::where('is_admin', false)->select('name', 'id')->get();
        return inertia('Admin/Trains/Show', compact('train', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Train $train)
    {
        $users = User::where('is_admin', false)->select('name', 'id')->get();
        return inertia('Admin/Trains/Form', compact('train', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TrainRequest $request, Train $train)
    {
        $validated = $request->validated();
        $train->update($validated);

        return redirect()->route('admin.trains.index')->with('success', 'Treino atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Train $train)
    {
        $train->delete();
        return redirect()->route('admin.trains.index')->with('success', 'Treino deletado com sucesso!');
    }
}
