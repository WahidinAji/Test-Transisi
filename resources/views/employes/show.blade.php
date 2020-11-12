@extends('layouts.main')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- AREA CHART -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Data employes detail <span><a href="{{ URL::route('employes.index') }}" class="badge badge-success ml-2"> back</a></span></h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                            <!-- <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button> -->
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <div class="card">
                                <div class="card-header">
                                  Data diri {{ $employe->name }}
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Alamat E-mail : {{ $employe->email }}</h5>
                                    @foreach ($company as $item)
                                    {{-- <h5 class="card-title">Bekerja di {{ $item->name }}</h5> --}}
                                    <p class="card-text">Bekerja di {{ $item->name }}</p>
                                    @endforeach
                                  {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                                </div>
                              </div>
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
