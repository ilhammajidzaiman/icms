@extends('private.templates.layout')

@section('header')
    edit status
@endsection

@section('container')
    <x-button-link href="{{ route(Request::segment(1) . '.management.user.status.index') }}" label="kembali"
        class="rounded-pill btn btn-md btn-outline-primary mb-3" icon="fa-fw fas fa-arrow-left" />

    <div class="row">
        <div class="col-12 col-md">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{ route(Request::segment(1) . '.management.user.status.update', $status->uuid) }}"
                            method="post">
                            @method('put')
                            @csrf
                            <div class="row">
                                <x-form-input-row type="text" name="name" label="nama"
                                    value="{{ old('name', $status->name) }}" class="col-md-4" />
                            </div>
                            <div class="row">
                                <x-form-input-row type="text" name="color" label="warna"
                                    value="{{ old('color', $status->color) }}" class="col-md-4" />
                            </div>
                            <x-button-submit label="simpan" class="btn btn-primary" icon="fa-fw fas fa-save" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
