@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session('success'))
                <div style="margin-bottom:15px; padding:10px; background:#d4edda; color:#155724; border-radius:5px;">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    Welcome to the best project management site.
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection