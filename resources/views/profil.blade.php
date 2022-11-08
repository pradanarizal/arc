@extends('layout.template')
@section('content')
    <div class="d-flex">
        <p class="col h3 mb-0">Profil</p>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-body text-center">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                        class="rounded-circle img-fluid" style="width: 150px;">
                    <p class="text-muted mb-1 mt-2">
                        <?php
                        if (auth()->user()->level == 'superadmin') {
                            echo 'Super Admin';
                        } elseif (auth()->user()->level == 'admin') {
                            echo 'Admin';
                        } else {
                            echo 'User';
                        }
                        ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-body">

                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Full Name</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ auth()->user()->name }}</p>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Email</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ auth()->user()->email }}</p>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Divisi</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ auth()->user()->divisi }}</p>
                        </div>
                    </div>

                    <hr>

                </div>
            </div>
        </div>
    </div>
@endsection
