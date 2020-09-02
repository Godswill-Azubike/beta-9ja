@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
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

        <div class="col-md-8 mt-5">
            <div class="card">
                <div class="card-header">{{ __('Upload App Update') }}</div>

                <div class="card-body">

                    @if (session()->has('success'))
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-success alert-dismissible show fade mt-2 mb-2">
                                <div class="alert-body">
                                  <button class="close" data-dismiss="alert">
                                    <span>&times;</span>
                                  </button>
                                  <i class="mdi mdi-alert-circle-outline"></i>{{session()->get('success')}}
                                </div>
                              </div>
                        </div>
                    </div>
                    @endif

                    @if ($errors->any())
                    <div class="alert alert-danger ml-3 mr-3">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{ route('update') }}" method="post" enctype="application/x-www-form-urlencoded">
                        @csrf
                        <label for="App">chose an App</label>
                        <input type="file" name="app" class="form-control mb-2">
                        <button type="submit" class="btn btn-info">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
