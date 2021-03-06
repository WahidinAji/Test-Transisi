@extends('layouts.main')
@section('content')
<section class="content">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show position-relativ" role="alert" style="z-index: 1">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ session('success') }}
        </div>
    @endif
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- AREA CHART -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Data Companies <span><a href="{{ URL::route('companies.create') }}" class="badge badge-success ml-2"> tambah data</a></span></h3>
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
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">E-mail</th>
                                        <th scope="col">Logo</th>
                                        <th scope="col">Website</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($company as $companies)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $companies->name }}</td>
                                        <td>{{ $companies->email }}</td>
                                        <td>
                                            <img src="{{ url('storage/'.$companies->logo)  }}" alt="{{ $companies->logo }}">
                                            {{-- <img style="width: 100px;" src="{{ asset("dist/img/Logo SMAN1BS.png")  }}" alt=""> --}}
                                            {{-- <img src="{{storage_path('app/company/'.$companies->logo) }}" alt="An image"> --}}
                                            {{-- <img src="{{asset($companies->logo) }}" alt="{{ $companies->logo }}"> --}}
                                        </td>
                                        <td>{{ $companies->website }}</td>
                                        <td>
                                            <a href="{{ URL::route('companies.edit',$companies->id) }}" class="badge badge-primary">Edit</a>
                                            <a href="{{ URL::route('companies.show',$companies->id) }}" class="badge badge-primary">Show</a>
                                            <form action="{{ URL::route('companies.destroy',$companies->id) }}"method="POST" class="badge" style="padding: 0%;">
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
                                        <td>@mdo</td>
                                        <td>@mdo</td>
                                        <td>@mdo</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                                {{ $company->links() }}
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
