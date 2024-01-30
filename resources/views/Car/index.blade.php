@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Car</li>
        </ol>
    </nav>

    <div class="row bg-white p-4 rounded">
        {{-- Alert Message --}}
        @if (session()->has('Success'))
            <div class="d-flex justify-content-center align-items-center">
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 50%; text-align: center;">
                    {{ session()->get('Success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @elseif (session()->has('Error'))
            <div class="d-flex justify-content-center align-items-center">
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="width: 50%; text-align: center;">
                    {{ session()->get('Error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>           
        @endif
        {{-- End Alert --}}

        <h2>Car Monitoring</h2>

        
        <div class="containerInput mb-2">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                Add New Car
            </button>
            @include('Car.Partials.AddCar')
    
        </div>

        <div>
            <table id="data-table" class="table table-striped" style="width:100%">
                <thead>
                    <tr class="sticky-header">
                        <th>Nomor Plat</th>
                        <th>Merek</th>
                        <th>Model</th>
                        <th>Tarif Harian</th>
                        <th>Ketersediaan</th>
                        {{-- <th class="text-center">Action</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Data as $data)
                    <tr>
                        <td>{{ $data['nomor_plat'] }}</td>
                        <td>{{ $data['merek'] }}</td>
                        <td>{{ $data['model'] }}</td>
                        <td>{{ $data['tarif_harian'] }}</td>
                        <td>
                            @if($data['status_sewa'] == 0)
                                Tersedia
                            @else
                                Tidak Tersedia
                            @endif
                        </td>
                        {{-- <td>
                            <a href="{{ route('FATStockCardView', ['id' => $data['id']]) }}" style="text-decoration:none">{{ $data['material_name'] }}</a>
                        </td>
                        <td>{{ $data['unit'] }}</td>
                        <td>{{ $data['restock_level'] }}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updateModal{{ $data['material_code'] }}">
                              Update
                            </button>
                            @include('FAT.Partials.UpdateRawMaterials')
                            
                            <button type="button" class="btn btn-info ml-2" data-bs-toggle="modal" data-bs-target="#updateArchive{{ $data['material_code'] }}">
                                Archive
                            </button>
                            @include('FAT.Partials.UpdateArchive')
                          
                        </td> --}}
                        {{-- <td class="text-center">
                            
                        </td> --}}
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Nomor Plat</th>
                        <th>Merek</th>
                        <th>Model</th>
                        <th>Tarif Harian</th>
                        <th>Ketersediaan</th>
                    </tr>
                </tfoot>
            </table>
        </div>
</div>
<script>
    $(document).ready(function() {
        $('#data-table').DataTable();
    });
</script>
@endsection
