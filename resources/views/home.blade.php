@extends('layouts.dash')
@section('content')
<main>
    <div class="pl-2 pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ __('Dashboard') }}</h1>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
