<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DashboardModel;

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
            'ruang' => $dataChart,
            // 'dokumen' => $this->model->getDokumen()
        ];
        return view('dashboard', $data, $this->notif_pending());
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
