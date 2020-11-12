@extends('layouts.main')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- AREA CHART -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Data mployes edit <span><a href="{{ URL::route('employes.index') }}" class="badge badge-success ml-2"> back</a></span></h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <form action="{{ URL::route('employes.update',$employe->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Employes Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="formGroupExampleInput" placeholder="Input names company" name="name" value="{{ $employe->name }}">
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
                                    <label for="formGroupExampleInput2">Employes E-mail</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Input email's company" name="email" value="{{ $employe->email }}">
                                    @error('email')
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ $message }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @enderror
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="select" class=" form-control-label">Select a Games</label>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <select name="companies_id" id="select" class="form-control @error('companies_id') is-invalid @enderror">
                                            <option disabled selected>pilih</option>
                                            @foreach($company as $companies)
                                                <option value="{{ $companies->id }}" >{{ $companies->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('companies_id')
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            {{ $message }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        @enderror
                                    </div>
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
