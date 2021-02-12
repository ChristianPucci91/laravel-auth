@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Upload your image</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="" action="{{ route('update-img')}}" method="post" enctype="multipart/form-data">

                      @csrf
                      @method('post')

                      <input type="file" class="form-control border-0" name="icon" value="">

                      <input type="submit" class="mt-5 btn btn-primary" name="" value="Send image"> <br>
                      <a href="{{ route('clear-img') }}" class="mt-2 btn btn-danger">Clear icon</a>


                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Icon</div>

                <div class="card-body">

                  @if (Auth::user()-> icon)

                    <h4>User icon</h4>

                    <img src="{{ asset('storage/icon/' . Auth::user() -> icon) }}" width="200px" height="50px"alt="">

                  @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
