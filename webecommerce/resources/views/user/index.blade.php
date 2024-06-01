@extends('layouts.main')
@section('container')

<div class="container-fluid">
    
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div>
    <div class="card-body">
        <div class="panel-body">
            <a href="{{route('user.create')}}" class="btn btn-md btn-success mb-3">TAMBAH DATA</a>
        </div>
        <div class="table-responsive w-100">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Email</th>
                   
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @forelse ($users as $data)
                        <tr>
                            <td class="text-center">{{ $no++}}</td>
                            <td class="text-center">{{ $data->name}}</td>
                            <td class="text-center">{{ $data->email}}</td>
                            
                        </tr>
                    @empty
                        
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
@endsection