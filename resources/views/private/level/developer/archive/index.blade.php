@extends('private.templates.layout')

@section('header')
    berkas
@endsection

@section('container')
    <x-button-link href="{{ route(Request::segment(1) . '.archive.create') }}" label="baru"
        class="rounded-pill btn btn-md btn-outline-primary mb-3" icon="fa-fw fas fa-plus" />

    @can('developer')
        <x-button-link href="{{ route(Request::segment(1) . '.archive.trash.index') }}" label="sampah ({{ $count }})"
            class="float-end" icon="fa-fw fas fa-trash" />
    @endcan

    <x-alert-dismissing />

    <div class="row">
        <div class="col-12 col-md">
            <div class="card">
                <div class="card-content">
                    <div class="card-header">
                        <form action="{{ route(Request::segment(1) . '.archive.index') }}" method="get">
                            @csrf
                            <div class="row justify-content-end">
                                <x-search-input name="search" id="search" value="{{ request('search') }}"
                                    class="col-md-4" />
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr class="text-capitalize">
                                        <th>#</th>
                                        <th>file</th>
                                        <th>status</th>
                                        <th>&nbsp;</th>
                                        <th width="250">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($archives as $key=>$archive)
                                        <tr>
                                            <td>{{ $archives->firstItem() + $key }}</td>
                                            <td>{{ $archive->title }}</td>
                                            <td>
                                                <x-badge class="rounded-pill bg-{{ $archive->status->color }}"
                                                    label="{{ $archive->status->name }}" />
                                            </td>
                                            <td class="text-end">
                                                <x-field-date :create="$archive->created_at" :update="$archive->updated_at" class="text-secondary" />
                                            </td>
                                            <td class="text-end">
                                                <x-button-link
                                                    href="{{ route(Request::segment(1) . '.archive.show', $archive->uuid) }}"
                                                    label="lihat" class="rounded-pill btn btn-sm btn-outline-primary"
                                                    icon="fa-fw fas fa-eye" />
                                                <x-button-link
                                                    href="{{ route(Request::segment(1) . '.archive.edit', $archive->uuid) }}"
                                                    label="edit" class="rounded-pill btn btn-sm btn-outline-success"
                                                    icon="fa-fw fas fa-edit" />
                                                <x-button-delete
                                                    href="{{ route(Request::segment(1) . '.archive.delete', $archive->uuid) }}"
                                                    confirm="{{ $archive->title }}" label="hapus"
                                                    class="rounded-pill btn btn-sm btn-outline-danger"
                                                    icon="fa-fw fas fa-trash" />
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6">
                                                <x-alert-empty label="Data tidak ditemukan..." />
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <x-pagination :pages="$archives" side="1" />
        </div>
    </div>
@endsection
