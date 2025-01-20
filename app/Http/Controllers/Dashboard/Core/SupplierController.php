<?php
namespace App\Http\Controllers\Dashboard\Core;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;

class SupplierController extends Controller
{
    /**
     * Display a listing of the suppliers.
     */
    public function index()
    {
        $suppliers = Supplier::all();
        if (request()->ajax()) {

            return DataTables::of($suppliers)
            // Add supplier name column
                ->addColumn('supplier_name', function ($row) {
                    return $row->name_ar ?: 'لا يوجد';
                })
                ->addColumn('email', function ($row) {
                    return $row->email ?: 'لا يوجد';
                })
                ->addColumn('phone', function ($row) {
                    return $row->phone ?: 'لا يوجد';
                })
                ->addColumn('address', function ($row) {
                    return $row->address ?: 'لا يوجد';
                })

            // Add control buttons column
                ->addColumn('control', function ($row) {
                    return '
                    <button type="button" id="edit-supplier" class="btn btn-primary btn-sm card-tools edit"
                        data-id="' . $row->id . '"
                        data-name="' . $row->name . '"
                        data-email="' . $row->email . '"
                        data-phone="' . $row->phone . '"
                        data-name_ar="' . $row->name_ar . '"
                        data-name_en="' . $row->name_en . '"
                        data-address="' . $row->address . '"
                        data-tax_number="' . $row->tax_number . '"
                        data-toggle="modal" data-target="#editSupplierModal">
                        <i class="far fa-edit fa-2x"></i>
                    </button>

                    <a id="delete_supplier_form"
                       data-table_id="suppliers-table"
                       data-href="' . route('dashboard.core.suppliers.destroy', $row->id) . '"
                       data-id="' . $row->id . '"
                       class="mr-2 btn btn-outline-danger btn-sm btn-delete delete_supplier_form">
                        <i class="far fa-trash-alt fa-2x"></i>
                    </a>';
                })
            // Mark raw HTML columns
                ->rawColumns([
                    'supplier_name',
                    'control',
                ])
                ->make(true);
        }

        return view('dashboard.core.suppliers.index', compact('suppliers'));
    }

    /**
     * Store a newly created supplier in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_ar'        => [
                'required',
                'string',
                'max:255',
                Rule::unique('suppliers', 'name_ar')->ignore($request->id),
            ],
            'name_en'        => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('suppliers', 'name_en')->ignore($request->id),
            ],
            'email'          => [
                'nullable',
                'email',
                Rule::unique('suppliers', 'email')->ignore($request->id),
            ],
            'phone'          => 'nullable|string|max:15',
            'address'        => 'nullable|string|max:255',
            'contact_person' => 'nullable|string|max:255',
            'tax_number'     => 'nullable|string|max:50',
        ]);

        try {
            // dd($validated);
            Supplier::create($validated);

            return redirect()->route('dashboard.core.suppliers.index')->with('success', __('dash.supplier_created_successfully'));
        } catch (\Exception $e) {
            return $e->getMessage();
            \Log::error('Error creating supplier: ' . $e->getMessage());

            return redirect()->back()->with('error', __('dash.supplier_creation_failed'));
        }
    }

    /**
     * Update the specified supplier in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        // Validate incoming data with dynamic unique rule for the email field
        $validated = $request->validate([
            'name_ar'        => 'required|string|max:255|unique:suppliers,name_ar,' . $supplier->id,
            'name_en'        => 'nullable|string|max:255|unique:suppliers,name_en,' . $supplier->id,
            'email'          => 'nullable|email|unique:suppliers,email,' . $supplier->id,
            'phone'          => 'nullable|string|max:15|unique:suppliers,phone,' . $supplier->id,
            'address'        => 'nullable|string|unique:suppliers,address,' . $supplier->id,
            'contact_person' => 'nullable|string|max:255',
            'tax_number'     => 'nullable|string|unique:suppliers,tax_number,' . $supplier->id,
        ]);

        // Update the supplier record with validated data
        $supplier->update($validated);

        // Redirect back with a success message

        return redirect()->route('dashboard.core.suppliers.index')->with('success', __('dash.supplier_updated_successfully'));
    }

    public function restore($id)
    {
        // Find the soft-deleted supplier and restore it
        $supplier = Supplier::withTrashed()->findOrFail($id);
        $supplier->restore();

        // Redirect back with a success message
        return redirect()->route('dashboard.core.suppliers.index')->with('success', __('dash.restored_successfully'));
    }

    /**
     * Remove the specified supplier from storage.
     */
    public function destroy($supplier)
    {

        $supplier = Supplier::findOrFail($supplier);

        $supplier->delete();

        return [
            'success' => true,
            'msg'     => __("dash.deleted_successfully"),
        ];

    }
}
