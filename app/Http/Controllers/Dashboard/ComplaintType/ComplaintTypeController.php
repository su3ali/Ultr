<?php
namespace App\Http\Controllers\Dashboard\ComplaintType;

use App\Http\Controllers\Controller;
use App\Http\Resources\ComplaintType\TypesResource;
use App\Models\ComplaintType;
use App\Support\Api\ApiResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ComplaintTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    use ApiResponse;

    public function index()
    {

        if (request()->ajax()) {

            $complaint_type = ComplaintType::all();

            return DataTables::of($complaint_type)
                ->addColumn('name', function ($row) {
                    return $row->name;
                })

                ->addColumn('controll', function ($row) {
                    $user = auth()->user();
                    $html = '';

                    // Check if the user has permission to update
                    if ($user->hasRole('admin') || $user->can('update_complaint_type')) {
                        $html .= '
                            <button type="button" id="add-work-exp" class="btn btn-sm btn-primary card-tools edit"
                                data-id="' . $row->id . '"
                                data-name_ar="' . $row->name_ar . '"
                                data-name_en="' . $row->name_en . '"
                                data-toggle="modal" data-target="#editModel">
                                <i class="far fa-edit fa-2x"></i>
                            </button>
                        ';
                    }

                    // Check if the user has permission to delete
                    if ($user->hasRole('admin') || $user->can('delete_complaint_type')) {
                        $html .= '
                            <a data-href="' . route('dashboard.complaint_type.destroy', $row->id) . '"
                                data-id="' . $row->id . '"
                                class="mr-2 btn btn-outline-danger btn-delete btn-sm">
                                <i class="far fa-trash-alt fa-2x"></i>
                            </a>
                        ';
                    }

                    return $html;
                })

                ->rawColumns([
                    'name',
                    'controll',
                ])
                ->make(true);
        }

        return view('dashboard.complaint_type.index');
    }

    protected function allType()
    {
        $complaint_type     = ComplaintType::latest()->get();
        $this->body['type'] = TypesResource::collection($complaint_type);
        return self::apiResponse(200, null, $this->body);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('dashboard.complaint_type.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_ar' => 'required|String|min:3',
            'name_en' => 'required|String|min:3',
        ]);

        $data = $request->except('_token');

        $complaint_type = ComplaintType::updateOrCreate($data);
        session()->flash('success');
        return redirect()->back();
    }

    public function edit($id)
    {
        return view('dashboard.complaint_type.edit');
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
        ]);
        $data = $request->except('_token');

        $complaint_type = ComplaintType::find($id);

        $complaint_type->update($data);
        session()->flash('success');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $complaint_type = ComplaintType::find($id);

        $complaint_type->delete();
        return [
            'success' => true,
            'msg'     => __("dash.deleted_success"),
        ];
    }
}
