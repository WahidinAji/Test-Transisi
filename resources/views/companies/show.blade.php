@extends('layouts.main')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- AREA CHART -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Data companies detail <span><a href="{{ URL::route('companies.index') }}" class="badge badge-success ml-2"> back</a></span></h3>
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
                                  Data company{{ $company->name }}
                                </div>
                                <div class="card-body">
                                    <table  class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Email</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($employe as $employes)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $employes->name_employe }}</td>
                                                <td>{{ $employes->email_employe }}</td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="3">not ready yet!!</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                        {{ $employe->links() }}
                                    </table>
                                </div>
                                <div class="card-footer">
                                    <h5 class="mt-3 card-title">Alamat E-mail : {{ $company->email }}</h5>
                                    <img style="width: 5%;" src="{{ url('storage/'.$company->logo)  }}" alt="{{ $company->logo }}">
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
