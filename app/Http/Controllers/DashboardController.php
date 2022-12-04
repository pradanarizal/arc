<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DashboardModel;
use App\Models\GeneralModel;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->model = new DashboardModel();
        $this->model2 = new GeneralModel();

    }

    public function beforelogin()
    {
        $dataModel = $this->model->getDataChart();
        $dataChart = array();
        // $dataYear = array();
        foreach ($dataModel as $value) {
            array_push($dataChart, array("$value->nama_ruang", $value->total));
        }
        $data = [
            'count_ruang' => $this->model->getRuang(),
            'count_dokumen' => $this->model->getDokumen(),
            'ruang' => $dataChart,
            // 'dokumen' => $this->model->getDokumen()
        ];
        return view('first', $data);
    }

    public function afterlogin()
    {
        $dataModel = $this->model->getDataChart();
        $dataChart = array();
        // $dataYear = array();
        foreach ($dataModel as $value) {
            array_push($dataChart, array("$value->nama_ruang", $value->total));
        }
        $data = [
            'count_ruang' => $this->model->getRuang(),
            'count_dokumen' => $this->model->getDokumen(),

            'count_all_pending' => $this->model2->get_all_pending(),
            'count_pengarsipan_pending' => $this->model2->get_pengarsipan_pending(),
            'count_retensi_pending' => $this->model2->get_retensi_pending(),

            'ruang' => $dataChart,
            // 'dokumen' => $this->model->getDokumen()
        ];
        return view('dashboard', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
