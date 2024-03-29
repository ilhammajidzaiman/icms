@extends('private.templates.layout')

@section('header')
    rincian child menu
@endsection

@section('container')
    <x-button-link href="{{ route(Request::segment(1) . '.management.user.menu.parent.index') }}" label="kembali"
        class="rounded-pill btn btn-md btn-outline-primary mb-3" icon="fa-fw fas fa-arrow-left" />

    <div class="row">
        <div class="col-12 col-md">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">
                            <x-form-input-row-readonly type="text" name="parent" label="parent"
                                value="{{ $menuChild->parent->name }}" class="col" />
                        </div>
                        <div class="row">
                            <x-form-input-row-readonly type="text" name="order" label="urutan"
                                value="{{ $menuChild->order }}" class="col-md-2" />
                        </div>
                        <div class="row">
                            <x-form-input-row-readonly type="text" name="name" label="nama"
                                value="{{ $menuChild->name }}" class="col-md-4" />
                        </div>
                        <div class="row">
                            <x-form-input-row-readonly type="text" name="icon" label="icon"
                                value="{{ $menuChild->icon }}" class="col-md-4" />
                        </div>
                        <div class="row">
                            <x-form-input-row-readonly type="text" name="prefix" label="prefix"
                                value="{{ $menuChild->prefix }}" class="col-md-4" />
                        </div>
                        <div class="row">
                            <x-form-input-row-readonly type="text" name="url" label="url"
                                value="{{ $menuChild->url }}" class="col-md-4" />
                        </div>
                        <div class="row">
                            <x-form-input-row-readonly type="text" name="created_at" label="dibuat"
                                value="{{ $menuChild->created_at->diffForHumans() . ', ' . $menuChild->created_at->format('d-m-Y, H:i:s') }}"
                                class="col-md-6" />
                            <x-form-input-row-readonly type="text" name="updated_at" label="diubah"
                                value="{{ $menuChild->updated_at->diffForHumans() . ', ' . $menuChild->updated_at->format('d-m-Y, H:i:s') }}"
                                class="col-md-6" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
