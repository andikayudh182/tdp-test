<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\User;
use App\Models\Rental;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataCar = Car::where('status_sewa', 0)->get();
        $dataUser = User::all();

        $dataRental = Rental::join('car', 'car.id', '=', 'rental.car_id')
                            ->select(['rental.*',
                                      'rental.id as RentalID',
                                      'car.*',
                                      'car.id as CarID'
                                
                            ])
                            ->get();
        return view('Rental.index',[
            'Data' => $dataRental,
            'DataCar' => $dataCar,
            'DataUser' => $dataUser,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            Rental::create([
                'car_id'=>  $request['car_id'],
                'user_id'=>  $request['user_id'],
                'tanggal_mulai'=>  $request['tanggal_mulai'],
                'tanggal_selesai'=>  $request['tanggal_selesai'],

            Car::where('id', $request['car_id'])->update([
                'status_sewa' => 1
            ])

            ]);
            return redirect()->back()->with('Success','New Rental Successfully Added!');
        } catch (\Exception $e) {
            return redirect()->back()->with('Error', 'Message : '.$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $idCar = $request['CarID'];
            $idRental = $request['RentalID'];
    
          
            $tarifHarian = Car::where('id', $idCar)->value('tarif_harian');
    

            $rentalData = Rental::where('id', $idRental)->select('tanggal_mulai', 'tanggal_pengembalian')->first();
    
       
            $tanggalMulai = new \DateTime($rentalData->tanggal_mulai);
            $tanggalPengembalian = new \DateTime($request['tanggal_pengembalian']);
            $selisihHari = $tanggalMulai->diff($tanggalPengembalian)->days;
    
     
            $totalPembayaran = $selisihHari * $tarifHarian;
    
            Car::where('id', $idCar)->update([
                'status_sewa' => 0,
            ]);
    
         
            Rental::where('id', $idRental)->update([
                'tanggal_pengembalian' => $request['tanggal_pengembalian'],
                'total_pembayaran' => $totalPembayaran,
            ]);
            return redirect()->back()->with('Success','Update Pengembalian Successfully Added!');
        } catch (\Exception $e) {
            return redirect()->back()->with('Error', 'Message : '.$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
