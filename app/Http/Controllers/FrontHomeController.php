<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class FrontHomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('front.home');


    }

    public function index()
    {
        $categories = Category::with([
            'services' => function ($query) {
                $query->where('status', 1) // Only active services
                    ->with('employees'); // Load all employees for each service
            }
        ])->where('status', 1)->get();

        $employees = Employee::with('services')->with('user')->get();

        return view('front.index', compact('categories', 'employees'));
    }






}