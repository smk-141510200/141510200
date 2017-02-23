<?php

namespace App\Http\Controllers;

use Request;
use App\golongan;
use Validator;
use Input;
use Alert;
class GolonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware('SA');
    }
    public function index()
    {
        $golongan = golongan::all();
        return view('golongan.index',compact('golongan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $golongan = golongan::all();
        return view('golongan.create',compact('golongan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=['kode_golongan'=>'required|unique:golongans',
                'nama_golongan'=>'required',
                'besaran_uang'=>'required|numeric'];
        $sms=['kode_golongan.required'=>'Harus Di Isi',
                'kode_golongan.unique'=>'Tidak Boleh Sama',
                'nama_golongan.required'=>'Harus Di Isi',
                'besaran_uang.required'=>'Harus Diisi',
                'besaran_uang.numeric'=>'Harus Angka'];
        $valid=Validator::make(Input::all(),$rules,$sms);
        if ($valid->fails()) {
            
            alert()->error('Data Salah');  
            return redirect('golongan/create')
            ->withErrors($valid)
            ->withInput();
        }
        else
        {
        alert()->success('Data Tersimpan');
        $golongan=Request::all();
        golongan::create($golongan);
        return redirect('golongan');
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
        $golongan=golongan::find($id); 
        return view('golongan.edit',compact('golongan')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data=Request::all(); 
        $kode_lama = golongan::where('id',$id)->first()->kode_golongan; 
        $nama_lama = golongan::where('id',$id)->first()->nama_golongan; 
        $uang_lama = golongan::where('id',$id)->first()->besaran_uang; 
        if($data['kode_golongan'] != $kode_lama) 
          { 
            $rules=['kode_golongan'=>'required|unique:golongans', 
                    'nama_golongan'=>'required', 
                    'besaran_uang'=>'required|numeric']; 
         
          } 
        elseif ($data['nama_golongan'] != $nama_lama) 
          { 
            $rules=['kode_golongan'=>'required', 
                    'nama_golongan'=>'required|unique:golongans', 
                    'besaran_uang'=>'required|numeric']; 
          } 
        elseif ($data['besaran_uang'] != $uang_lama) 
          { 
            $rules=['kode_golongan'=>'required', 
                    'nama_golongan'=>'required', 
                    'besaran_uang'=>'required|numeric|unique:golongans']; 
          }   
        else 
          { 
            $rules=['kode_golongan'=>'required', 
                     'nama_golongan'=>'required', 
                     'besaran_uang'=>'required|numeric']; 
          } 
            $sms=['kode_golongan.required'=>'Harus Di Isi', 
                  'nama_golongan.unique'=> 'Nama '.$data['nama_golongan'].' Sudah ada', 
                  'kode_golongan.unique'=>'Kode '.$data['kode_golongan'].' Sudah ada', 
                  'besaran_uang.unique'=>'Besaran Uang '.$data['besaran_uang'].' Sudah ada', 
                  'nama_golongan.required'=>'Harus Di Isi', 
                  'besaran_uang.required'=>'Harus Diisi', 
                  'besaran_uang.numeric'=>'Harus Angka']; 
            $valid=Validator::make(Input::all(),$rules,$sms); 
         if ($valid->fails()) 
            { 
              alert()->error('Data Salah');   
              return redirect('golongan/'.$id.'/edit') 
              ->withErrors($valid) 
              ->withInput(); 
            } 
         else 
            { 
             golongan::where('id', $id)->first()->update([ 
             'kode_golongan'=> $data['kode_golongan'], 
             'nama_golongan'=> $data['nama_golongan'], 
             'besaran_uang'=> $data['besaran_uang'] 
             ]
             ); 
         } 
         return redirect('golongan'); 
     } 
  
     /** 
156      * Remove the specified resource from storage. 
157      * 
158      * @param  int  $id 
159      * @return \Illuminate\Http\Response 
160      */ 

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        golongan::find($id)->delete();
        alert()->success('Data Terhapus');
        return redirect('golongan');
    }
}
