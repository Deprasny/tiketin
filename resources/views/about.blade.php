@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('About') }}</h1>
    <div class="container">
        <div class="card-deck">
            <div class="card">
                <img src="{{ asset('img/suganda.jpeg') }}" style="display: block;
        width: 100%;
        height: auto;" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Suganda Saefuloh </h5>
                    <p class="card-text">18402098 <br>SISTEM INFORMASI <br>ILMU TEKNOLOGI DAN KOMPUTER <br>POLITEKNIK PIKSI GANESHA</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
            <div class="card">
                <img src="{{ asset('img/depras.jpeg') }}" style="display: block;
        width: 100%;
        height: auto;" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Depras Nur Yadi </h5>
                    <p class="card-text">18402075 <br>SISTEM INFORMASI <br>ILMU TEKNOLOGI DAN KOMPUTER <br>POLITEKNIK PIKSI GANESHA</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
            <div class="card">
                <img src="{{ asset('img/riki.jpeg') }}" style="display: block;
        width: 100%;
        height: auto;" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Ricky Aprian Nugrah </h5>
                    <p class="card-text">18402084 <br>SISTEM INFORMASI <br>ILMU TEKNOLOGI DAN KOMPUTER <br>POLITEKNIK PIKSI GANESHA</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>
        <h4 align="center" class="card-title pt-5">Moch Rizki Saepuloh S., S.Tr.T., M.I.KOM </h4>
        <h4 align="center" class="card-title pt-5">(Dosen Mata Kuliah) </h4>
    </div>
@endsection

@push('notif')
@if (session('success'))
<div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (session('status'))
    <div class="alert alert-success border-left-success" role="alert">
        {{ session('status') }}
    </div>
@endif
@endpush
