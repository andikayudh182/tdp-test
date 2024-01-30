@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script> 




<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Rental</li>
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

        <h2>Rental Car Monitoring</h2>

        
        <div class="containerInput mb-2">
            <button type="button" class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"">
               Add New Rental 
            </button>

            <div class="collapse mt-2" id="collapseExample">
                @include('Rental.Partials.AddRental')
            </div>
        </div>

        <div>
            <table id="data-table" class="table table-striped" style="width:100%">
                <thead>
                    <tr class="sticky-header">
                        <th>ID</th>
                        <th>Nomor Plat</th>
                        <th>Model</th>
                        <th>Merek</th>
                        <th>Tarif Harian</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Total Pembayaran</th> 
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Data as $data)
                        
                    <tr>
                        <td>{{ $data['RentalID'] }}</td>
                        <td>{{ $data['nomor_plat'] }}</td> 
                        <td>{{ $data['model'] }}</td> 
                        <td>{{ $data['merek'] }}</td> 
                        <td>{{ $data['tarif_harian'] }}</td>
                        <td>{{ $data['tanggal_mulai'] }}</td>
                        <td>{{ $data['tanggal_selesai'] }}</td>  
                        <td>{{ $data['tanggal_pengembalian'] }}</td>
                        <td>{{ $data['total_pembayaran'] }}</td>
                        <td>
                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#updateModal{{ $data['RentalID'] }}">
                               Pengembalian
                            </button>
                            @include('Rental.Partials.UpdatePengembalian')
                        </td>

                    </tr>
                    @endforeach 
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Nomor Plat</th>
                        <th>Model</th>
                        <th>Merek</th>
                        <th>Tarif Harian</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Total Pembayaran</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>

</div>

<script>
    $(document).ready(function() {
        $('#data-table').DataTable();

    });

    $('#user_id').select2({
            theme: 'bootstrap4'
     });
    $('#car_id').select2({
            theme: 'bootstrap4'
     });



    
</script>

@endsection
