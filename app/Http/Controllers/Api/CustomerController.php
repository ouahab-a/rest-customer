<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $query = Customer::query();

        // Filtering
        if ($request->has('filter.name')) {
            $query->where('first_name', 'like', '%' . $request->input('filter.name') . '%');
        }

        if ($request->has('filter.email')) {
            $query->where('email', 'like', '%' . $request->input('filter.email') . '%');
        }

        // Sorting
        if ($request->has('sort.name')) {
            $query->orderBy('first_name', $request->input('sort.name'));
        }

        if ($request->has('sort.email')) {
            $query->orderBy('email', $request->input('sort.email'));
        }

        // Pagination params
        $perPage = $request->input('page.size', 15);
        $page = $request->input('page.number', 1);

        $users = $query->paginate($perPage, ['*'], 'page[number]', $page)
            ->appends($request->query());

        // JSON API format
        return response()->json([
            'data' => $users->items(),

            'links' => [
                'first' => $users->url(1),
                'last'  => $users->url($users->lastPage()),
                'prev'  => $users->previousPageUrl(),
                'next'  => $users->nextPageUrl(),
            ],

            'meta' => [
                'current_page' => $users->currentPage(),
                'from'         => $users->firstItem(),
                'last_page'    => $users->lastPage(),
                'path'         => $users->path(),
                'per_page'     => $users->perPage(),
                'to'           => $users->lastItem(),
                'total'        => $users->total(),
            ],
        ])
            ->header('x-api-version', 'v1'); // custom header
    }
}
