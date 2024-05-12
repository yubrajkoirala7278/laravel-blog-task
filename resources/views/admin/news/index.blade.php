@extends('admin.layouts.master')
@section('content')
<div class="p-4 bg-white">
    <div class="d-flex align-items-center justify-content-between">
        <h2 class="fs-5 mb-3 fw-bold">News</h2>
        <a href="{{ route('news.create') }}" class="text-success  fs-4"><i class="fa-solid fa-circle-plus"></i></a>
    </div>
</div>
@endsection

@section('script')
@endsection