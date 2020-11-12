@extends('layouts.main')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- AREA CHART -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Data Employes <span><a href="{{ URL::route('employes.create') }}" class="badge badge-success ml-2"> tambah data</a></span></h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                            <!-- <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button> -->
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($employe as $employes)
                                    <tr>
                                        <td></td>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $employes->name }}</td>
                                        <td>
                                            <a href="{{ URL::route('employes.edit',$employes->id) }}" class="badge badge-primary">Edit</a>
                                            <a href="{{ URL::route('employes.show',$employes->id) }}" class="badge badge-primary">Show</a>
                                            <form action="{{ URL::route('employes.destroy',$employes->id) }}"method="POST" class="badge" style="padding: 0%;">
                                                @method('delete')
                                                @csrf
                                                <button class="badge badge-danger" style="border-color: transparent;">
                                                    Delete
                                                    {{-- <span class="badge badge-danger" style="padding: 0%;">Delete</span> --}}
                                                </button>
                                            </form>
                                            {{-- <a href="" class="badge badge-primary">Delete</a> --}}
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
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
