<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index(Request $request)
    {
        $query = Supplier::query();

        // Search functionality
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'like', "%{$searchTerm}%")
                  ->orWhere('email', 'like', "%{$searchTerm}%")
                  ->orWhere('phone', 'like', "%{$searchTerm}%")
                  ->orWhere('address', 'like', "%{$searchTerm}%");
            });
        }

        // Filter by contact info availability
        if ($request->filled('contact_filter')) {
            if ($request->contact_filter === 'with_email') {
                $query->whereNotNull('email');
            } elseif ($request->contact_filter === 'with_phone') {
                $query->whereNotNull('phone');
            } elseif ($request->contact_filter === 'complete_info') {
                $query->whereNotNull('email')->whereNotNull('phone')->whereNotNull('address');
            }
        }

        // Sorting
        $sortBy = $request->get('sort_by', 'created_at');
        $sortDirection = $request->get('sort_direction', 'desc');

        if (in_array($sortBy, ['name', 'email', 'created_at'])) {
            $query->orderBy($sortBy, $sortDirection);
        } else {
            $query->orderBy('created_at', 'desc');
        }

        $suppliers = $query->paginate(10);
        $suppliers->appends($request->all()); // Keep filters in pagination links

        $totalSuppliers = Supplier::count();
        $suppliersWithEmail = Supplier::whereNotNull('email')->count();
        $suppliersWithPhone = Supplier::whereNotNull('phone')->count();
        $suppliersWithCompleteInfo = Supplier::whereNotNull('email')->whereNotNull('phone')->whereNotNull('address')->count();

        return view('suppliers.index', compact(
            'suppliers',
            'totalSuppliers',
            'suppliersWithEmail',
            'suppliersWithPhone',
            'suppliersWithCompleteInfo'
        ));
    }

    public function create()
    {
        return view('suppliers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
        ]);

        Supplier::create($validated);

        return redirect()->route('suppliers.index')->with('success', 'Supplier added successfully.');
    }

    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit', compact('supplier'));
    }

    public function update(Request $request, Supplier $supplier)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
        ]);

        $supplier->update($validated);

        return redirect()->route('suppliers.index')->with('success', 'Supplier updated successfully.');
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect()->route('suppliers.index')->with('success', 'Supplier deleted.');
    }
}
