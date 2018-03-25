<?php

namespace Bantenprov\Kegiatan\Http\Controllers;

/* Require */
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bantenprov\Kegiatan\Facades\KegiatanFacade;

/* Models */
use Bantenprov\Kegiatan\Models\Bantenprov\Kegiatan\Kegiatan;

/* Etc */
use Validator;

/**
 * The KegiatanController class.
 *
 * @package Bantenprov\Kegiatan
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class KegiatanController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Kegiatan $kegiatan)
    {
        $this->kegiatan = $kegiatan;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (request()->has('sort')) {
            list($sortCol, $sortDir) = explode('|', request()->sort);

            $query = $this->kegiatan->orderBy($sortCol, $sortDir);
        } else {
            $query = $this->kegiatan->orderBy('id', 'asc');
        }

        if ($request->exists('filter')) {
            $query->where(function($q) use($request) {
                $value = "%{$request->filter}%";
                $q->where('label', 'like', $value)
                    ->orWhere('description', 'like', $value);
            });
        }

        $perPage = request()->has('per_page') ? (int) request()->per_page : null;
        $response = $query->paginate($perPage);

        return response()->json($response)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kegiatan = $this->kegiatan;

        $response['kegiatan'] = $kegiatan;
        $response['status'] = true;

        return response()->json($kegiatan);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kegiatan = $this->kegiatan;

        $validator = Validator::make($request->all(), [
            'label' => 'required|max:255|unique:kegiatans,label',
            'description' => 'max:255',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
        ]);

        if($validator->fails()){
            $check = $kegiatan->where('label',$request->label)->whereNull('deleted_at')->count();

            if ($check > 0) {
                $response['message'] = 'Failed, label ' . $request->label . ' already exists';
            } else {
                $kegiatan->label = $request->input('label');
                $kegiatan->description = $request->input('description');
                $kegiatan->tanggal_mulai = $request->input('tanggal_mulai');
                $kegiatan->tanggal_selesai = $request->input('tanggal_selesai');
                $kegiatan->save();

                $response['message'] = 'success';
            }
        } else {
            $kegiatan->label = $request->input('label');
            $kegiatan->description = $request->input('description');
            $kegiatan->tanggal_mulai = $request->input('tanggal_mulai');
            $kegiatan->tanggal_selesai = $request->input('tanggal_selesai');
            $kegiatan->save();

            $response['message'] = 'success';
        }

        $response['status'] = true;

        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kegiatan = $this->kegiatan->findOrFail($id);

        $response['kegiatan'] = $kegiatan;
        $response['status'] = true;

        return response()->json($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kegiatan = $this->kegiatan->findOrFail($id);

        $response['kegiatan'] = $kegiatan;
        $response['status'] = true;

        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kegiatan = $this->kegiatan->findOrFail($id);

        if ($request->input('old_label') == $request->input('label'))
        {
            $validator = Validator::make($request->all(), [
                'label' => 'required|max:16',
                'description' => 'max:255',
                'tanggal_mulai' => 'required',
                'tanggal_selesai' => 'required',
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'label' => 'required|max:16|unique:kegiatans,label',
                'description' => 'max:255',
                'tanggal_mulai' => 'required',
                'tanggal_selesai' => 'required',
            ]);
        }

        if ($validator->fails()) {
            $check = $kegiatan->where('label',$request->label)->whereNull('deleted_at')->count();

            if ($check > 0) {
                $response['message'] = 'Failed, label ' . $request->label . ' already exists';
            } else {
                $kegiatan->label = $request->input('label');
                $kegiatan->description = $request->input('description');
                $kegiatan->tanggal_mulai = $request->input('tanggal_mulai');
                $kegiatan->tanggal_selesai = $request->input('tanggal_selesai');
                $kegiatan->save();

                $response['message'] = 'success';
            }
        } else {
            $kegiatan->label = $request->input('label');
            $kegiatan->description = $request->input('description');
            $kegiatan->tanggal_mulai = $request->input('tanggal_mulai');
            $kegiatan->tanggal_selesai = $request->input('tanggal_selesai');
            $kegiatan->save();

            $response['message'] = 'success';
        }

        $response['status'] = true;

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kegiatan = $this->kegiatan->findOrFail($id);

        if ($kegiatan->delete()) {
            $response['status'] = true;
        } else {
            $response['status'] = false;
        }

        return json_encode($response);
    }
}
