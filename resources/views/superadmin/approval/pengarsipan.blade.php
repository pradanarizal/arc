@extends('layout.template')
@section('content')
    <!-- Page Heading -->

    <div class="d-flex align-items-center mb-3">
        <p class="h3 mb-0 text-gray-800 mr-1 font-weight-bold">Transaksi</p>
        <p class="mb-0 text-gray-800 text-small">Data Approval Pengarsipan</p>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <div class="d-flex align-items-center justify-content-between mb-1 p-1">
                    <div></div>
                    <div></div>
                    <div class="d-flex align-items-center justify-content-between">
                        <form action="/approval/pengarsipan" method="GET"
                            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group">
                                <input type="text" name="keyword" id="pengarsipanSearch"
                                    class="form-control bg-light border-0 small" placeholder="Search" aria-label="Search"
                                    aria-describedby="basic-addon2" value="{{ request('keyword') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <table class="table table-bordered" id="pengarsipanSearch" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No. Dok</th>
                            <th>Nama Dokumen</th>
                            <th>Jenis Dokumen</th>
                            <!-- <th>Tahun Dokumen</th> -->
                            <th>Deskripsi</th>
                            <!-- <th>Tanggal Upload</th> -->
                            <th>Pemohon</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no = 1; ?>
                        {{-- Ambil data dari controller --}}
                        @foreach ($pengarsipan as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->no_dokumen }}</td>
                                <td>{{ $item->nama_dokumen }}</td>
                                <td>{{ $item->jenis_dokumen }}</td>
                                {{--<td>{{ $item->tahun_dokumen }}</td>--}}
                                <td>{{ $item->deskripsi }}</td>
                                {{--<td>{{ date('d-m-Y', strtotime($item->tgl_upload)) }}</td>--}}
                                <td>{{ $item->name }}</td>
                                <td class="text-center">
                                    @if ($item->status_pengarsipan == 'Pending')
                                        <span title="Menunggu Approval"
                                            class="badge badge-warning p-2">{{ $item->status_pengarsipan }}</span>
                                    @elseif ($item->status_pengarsipan == 'Ya')
                                        <span title="Approved"
                                            class="badge badge-success p-2">{{ $item->status_pengarsipan }}</span>
                                    @else
                                        <span title="Rejected"
                                            class="badge badge-danger p-2">{{ $item->status_pengarsipan }}</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($item->status_pengarsipan == 'Pending')
                                        <button type="button" class="btn btn-sm bg-primary text-white" data-bs-toggle="dropdown">
                                            <i class="fas fa-cog"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a type="button" class="dropdown-item text-warning"
                                                    href="/detail_dokumen/{{ $item->id_dokumen }}"><i
                                                        class="fas fa-eye fa-warning"></i> View</a>
                                            </li>
                                            <li><a type="button" class="dropdown-item text-success" data-bs-toggle="modal"
                                                    data-bs-target="#approve_pengarsipan{{ $item->id_dokumen }}"><i
                                                        class="fa fa-check"></i>
                                                    Approve</a></li>
                                            <li><a type="button" class="dropdown-item text-danger" data-bs-toggle="modal"
                                                    data-bs-target="#tolak_pengarsipan{{ $item->id_dokumen }}"><i
                                                        class="fa fa-times"></i> Reject</a>
                                            </li>
                                        </ul>
                                    @else
                                        <a title="View" href="/detail_dokumen/{{ $item->id_dokumen }}"
                                            class="btn btn-warning btn-sm"> <i class=" fas fa-eye fa-warning"></i>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>{{ $pengarsipan->links('pagination::bootstrap-5') }}</div>
            </div>
        </div>
    </div>
    @include('superadmin.modal.m_approve_arsip')
    @include('superadmin.modal.m_approve_tolak_arsip')
    @include('sweetalert::alert')
@endsection
