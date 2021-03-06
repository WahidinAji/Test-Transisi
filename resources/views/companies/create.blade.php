@extends('layouts.main')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- AREA CHART -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Data companies create <span><a href="{{ URL::route('companies.index') }}" class="badge badge-success ml-2"> back</a></span></h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                            <!-- <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button> -->
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <form action="{{ URL::route('companies.store') }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Company Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="formGroupExampleInput" placeholder="Input names company" name="name" value="{{ old('name') }}">
                                    @error('name')
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ $message }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Company E-mail</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Input email's company" name="email" value="{{ old('email') }}">
                                    @error('email')
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ $message }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Company Website</label>
                                    <input type="text" class="form-control @error('website') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Input websites's company" name="website" value="{{ old('website') }}">
                                    @error('website')
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ $message }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @enderror
                                </div>

                                {{-- <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('logo') is-invalid @enderror" name="logo" value="{{ old('logo') }}">
                                    <label class="custom-file-label" for="logo">Choose file</label>
                                </div> --}}




                                <div class="form-group col-sm-4">
                                    <label for="formGroupExampleInput2">Company Logo</label>
                                    <div class="file">
                                        <input type="file" class="file-input" id="formGroupExampleInput2" name="logo" value="{{ old('logo') }}">
                                    </div>
                                    @error('logo')
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ $message }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Save</button>
                              </form>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
@endsection
