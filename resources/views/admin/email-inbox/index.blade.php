@extends('admin.layouts.master')
@section('mainTitle', 'Emails')
@section('content')
    <!-- Main Content -->

    <div class="card-header">
        <h4>All messages</h4>

    </div>
    <div class="card-body">
        {{ $dataTable->table() }}
    </div>

    {{-- scripts------------------------------------------------------- --}}
    @push('scripts')
        {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    @endpush
@endsection
