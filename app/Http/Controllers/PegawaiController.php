<?php

namespace App\Http\Controllers;

use Request;
use App\User;
use App\pegawai;
use App\golongan;
use App\jabatan;
use Validator;
use Input;
use Alert;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use RegistersUsers;
    
    public function index()
    {
        $pegawai = pegawai::with('jabatan')->get();
        $pegawai = pegawai::with('golongan')->get();
        $pegawai = pegawai::with('User')->get();
        $pegawai = pegawai::all();
        return view('pegawai.index',compact('pegawai'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $golongan = golongan::all();
        $jabatan = jabatan::all();
        return view('pegawai.create',compact('golongan','jabatan'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Request::all();
        $rules = [  
            'name' => 'required|max:255',
            'nip'  => 'required|numeric|min:3|unique:pegawais',
            'email' => 'required|email|max:255|unique:users',
            'permission' => 'required|max:255',
            'password' => 'required|min:6|confirmed',
            'jabatan_id' => 'required',
            'golongan_id' => 'required',
            'photo' => 'required'];
        $sms = ['nip.required' => 'Harus Diisi',
                'nip.unique' => 'Data Sudah Ada',
                'nip.numeric' => 'Harus Angka',
                'email.required' => 'Harus Diisi',
                'email.unque' => 'Data Sudah Ada',
                'jabatan_id.required' => 'Harus Diisi',
                'golongan_id.required' => 'Harus Diisi',
                'photo.required' => 'Harus Diisi',
                'email.email' => 'Harus Format Email',
                'name.required' => 'Harus Diisi',
                'password.min' => 'Sandi harus minimal 6 karakter',
                'nip.min' => 'nip harus minimal 3.',
                ];
        $valid=Validator::make(Input::all(),$rules,$sms);
        if ($valid->fails()) {
            alert()->error('Data Salah');  
            return redirect('pegawai/create')
            ->withErrors($valid)
            ->withInput();
        }
        else
        {
        alert()->success('Data Tersimpan');
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'permission' => $data['permission'],
            'password' => bcrypt($data['password']),
        ]);
        
        $file = Input::file('photo');
        $destinationPath = public_path().'/account/foto';
         $filename = $file->getClientOriginalName();
        $filename = $user->name.'_'.$file->getClientOriginalName();
        $uploadSuccess = $file->move($destinationPath, $filename);
        $photo = $filename;
        pegawai::create([
            'nip' => $data['nip'],
            'user_id' => $user->id,
            'jabatan_id' => $data['jabatan_id'],
            'golongan_id' => $data['golongan_id'],
            'photo' => $photo,
            ]);
           
            }      
        return redirect('/pegawai');
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
        $data = pegawai::where('id',$id)->with('golongan','jabatan','User')->first();
        $jabatan = jabatan::all();
        $golongan = golongan::all();
        return view('pegawai.edit',compact('pegawai','jabatan','golongan','data'));
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
        $old_pegawai = pegawai::where('id', $id)->first();
        $old_email = User::where('id', $old_pegawai->user_id)->first()->email;
        $old_password = User::where('id', $old_pegawai->user_id)->first()->password;
        $data = Request::all();
        $validati = ([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'permission' => 'required',
            'password' => 'required|min:6',
            'nip'=>'required|unique:pegawais',
            'jabatan_id' => 'required',
            'golongan_id' => 'required',
            'photo' => 'required',
            ]);
        if ($old_email==$data['email']) {
            $validati['email'] = '';
            $data['email'] = $old_email;
        }
        if ($data['password']==null) {
            $validati['password'] = '';
            $data['password'] = $old_password;
        }
        else{
            $validati['password'] = 'min:6';
            $data['password'] = bcrypt($data['password']);
        }
        if (Input::file() == null)
        {
            $validati['photo'] = '';
        }
        if ($data['nip']==$old_pegawai['nip'])
        {
            $validati['nip'] = '';
        }
        else{
            $validati['nip'] = 'required|unique:pegawais';
        }
        $validation = Validator::make(Request::all(), $validati);
        if ($validation->fails()) {
            return redirect('pegawai/'.$id.'/edit')->withErrors($validation)->withInput();
        }
        $user = User::where('id', $old_pegawai->user_id)->first()->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'permission' => $data['permission'],
            'password' => $data['password'],
            ]);
        $user = User::where('id', $old_pegawai->user_id)->first();
        
        if (Input::file()==null)
        {
            $data['photo'] = $old_pegawai->photo;
        }
        else
        {
            $file = Input::file('photo');
            $destination_path = public_path().'/account/foto';
            $filename = $user->name.'_'.$file->getClientOriginalName();
            $uploadSuccess = $file->move($destination_path,$filename);
            $data['photo'] = $filename;
        }
        pegawai::where('id', $id)->first()->update([
            'nip' => $data['nip'],
            'jabatan_id' => $data['jabatan_id'],
            'golongan_id' => $data['golongan_id'],
            'photo' => $data['photo'],
            ]);
        return redirect('pegawai');
    }
    /**
     * Remove the specified resource from storage.
         *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pegawai = pegawai::where('id',$id)->first();
        $user = User::where('id',$pegawai->user_id)->first()->delete();
        
            alert()->success('Data Terhapus');
        
        return redirect('pegawai');
    }
}
?>