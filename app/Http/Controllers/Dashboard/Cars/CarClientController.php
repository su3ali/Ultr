<?php
namespace App\Http\Controllers\Dashboard\Cars;

use App\Http\Controllers\Controller;
use App\Models\CarClient;
use App\Models\CarModel;
use App\Models\CarType;
use App\Models\User;
use App\Traits\imageTrait;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CarClientController extends Controller
{
    use imageTrait;
    public function index()
    {

        if (request()->ajax()) {

            $car_client = CarClient::all();

            return DataTables::of($car_client)
                ->addColumn('user_name', function ($row) {
                    return $row->user?->first_name . ' ' . $row->user?->last_name;
                })

                ->addColumn('type', function ($row) {
                    return $row->type?->name;
                })
                ->addColumn('model', function ($row) {
                    return $row->model?->name;
                })

                ->addColumn('controll', function ($row) {

                    $html = '
                    <a href="' . route('dashboard.car_client.edit', $row->id) . '" class="mr-2 btn btn-outline-warning btn-sm"><i class="far fa-edit fa-2x"></i> </a>


                                <a data-href="' . route('dashboard.car_client.destroy', $row->id) . '" data-id="' . $row->id . '" class="mr-2 btn btn-outline-danger btn-delete btn-sm">
                            <i class="far fa-trash-alt fa-2x"></i>
                    </a>
                                ';

                    return $html;
                })

                ->rawColumns([
                    'user_name',
                    'type',
                    'model',
                    'color',
                    'controll',
                ])
                ->make(true);
        }
        return view('dashboard.car_client.index');
    }

    public function create()
    {
        $types = CarType::all();
        $users = User::all();
        return view('dashboard.car_client.create', compact('types', 'users'));
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'user_id' => 'required|exists:users,id',
    //         'type_id' => 'required|exists:car_types,id',
    //         'color' => 'required',
    //         'Plate_number' => 'required',

    //     ]);

    //     $data=$request->except('_token');

    //     $car_client = CarClient::updateOrCreate($data);
    //     session()->flash('success');
    //     return redirect()->route('dashboard.car_client.index');
    // }

    public function store(Request $request)
    {
        $request->validate([
            'user_id'      => 'required|exists:users,id',
            'type_id'      => 'required|exists:car_types,id',
            'model_id'     => 'required|exists:car_models,id',
            'color'        => 'required|string',
            'Plate_number' => 'required|string',
        ]);

        $data = $request->except('_token');

        $car_client = CarClient::updateOrCreate(
            ['Plate_number' => $data['Plate_number']], // شرط التحقق
            $data
        );

        if ($request->ajax()) {
            return response()->json([
                'status'  => true,
                'car_id'  => $car_client->id,
                'message' => __('dash.saved_successfully'),
            ]);
        }

        session()->flash('success');
        return redirect()->route('dashboard.car_client.index');
    }

    public function edit($id)
    {
        $types      = CarType::all();
        $car_client = CarClient::where('id', $id)->first();
        $users      = User::all();
        $models     = CarModel::where('type_id', $car_client->type_id)->get();

        return view('dashboard.car_client.edit', compact('types', 'car_client', 'users', 'models'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'user_id'      => 'required|exists:users,id',
            'type_id'      => 'required|exists:car_types,id',
            'color'        => 'required',
            'Plate_number' => 'required',

        ]);
        $data = $request->except('_token');

        $car_client = CarClient::find($id);

        $car_client->update($data);
        session()->flash('success');
        return redirect()->route('dashboard.car_client.index');
    }

    public function destroy($id)
    {
        $car_client = CarClient::find($id);

        $car_client->delete();
        return [
            'success' => true,
            'msg'     => __("dash.deleted_success"),
        ];
    }

    public function getModelByType(Request $request)
    {

        $car_model = CarModel::where('type_id', $request->type_id)->get()->pluck('name', 'id');
        return $car_model;

    }

    public function checkCar(Request $request)
    {
        $request->validate([
            'user_id'      => 'required|exists:users,id',
            'Plate_number' => 'required|string',
        ]);

        $plate = trim(strtolower($request->Plate_number)); // إزالة الفراغات وتحويل لحروف صغيرة

        $car = CarClient::where('user_id', $request->user_id)
            ->whereRaw('LOWER(Plate_number) = ?', [$plate])
            ->first();

        if ($car) {
            return response()->json([
                'exists' => true,
                'car_id' => $car->id,
                // 'type' => $car->type->name ?? null, // اختياري
                // 'model' => $car->model->name ?? null, // اختياري
            ]);
        }

        return response()->json(['exists' => false]);
    }

}
