<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MealRequest;
use App\Models\Meal;
use App\Models\User;
use Illuminate\Http\Request;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $meals = Meal::whereActive(1)->with('user')->orderBy('created_at', 'desc')->paginate();
        return inertia('Admin/Meals/Index', compact('meals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $meal = new Meal();
        $meal->start_date = date('Y-m-d');
        $users = User::where('is_admin', false)->select('name', 'id')->get();
        return inertia('Admin/Meals/Form', compact('users', 'meal'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MealRequest $request)
    {
        $validated = $request->validated();
        Meal::create($validated);

        return redirect()->route('admin.meals.index')->with('success', 'Refeição criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Meal $meal)
    {
        $users = User::where('is_admin', false)->select('name', 'id')->get();
        return inertia('Admin/Meals/Show', compact('meal', 'users'));
    }   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Meal $meal)
    {
        $users = User::where('is_admin', false)->select('name', 'id')->get();
        return inertia('Admin/Meals/Form', compact('meal', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MealRequest $request, Meal $meal)
    {
        $validated = $request->validated();
        $meal->update($validated);

        return redirect()->route('admin.meals.index')->with('success', 'Refeição atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Meal $meal)
    {
        $meal->delete();
        return redirect()->route('admin.meals.index')->with('success', 'Refeição excluída com sucesso!');
    }
}
