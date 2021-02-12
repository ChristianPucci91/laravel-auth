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

                    <form class="" action="{{ route('update-img')}}" method="post">

                      @csrf
                      @method('post')

                      <input type="file" class="form-control border-0" name="icon" value="">

                      <input type="submit" class="mt-5" name="" value="Send image">

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
