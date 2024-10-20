@extends('layout.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>{{ $page->title }}</strong>
                </div>
                <div class="card-body">
                    {!! $page->content !!}  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
