<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use LaravelQRCode\Facades\QRCode;
use App\Models\Data;
use Alert;
use PDF;
class DataController extends Controller
{
    public function index(){
        $data = Data::all();
        return view ('dashboard', ['data' => $data]);
    }
    public function store(Request $request){
        $this->validate($request, [
        'firstname'   => 'required',
        'lastname'    => 'required',
        'jabatan'     => 'required',
        'email'       => 'required',
        'rumah'       => 'required',
        'perusahaan'  => 'required',
        'phone'       => 'required'
    ]);
   
    $data = Data::create($request->all());  
    return back();
}
    public function generate ($id)
    {
        $data = Data::findOrFail($id);
        $firstname = $data->firstname;
        $lastname = $data->lastname;
        $title = $data->jabatan;
        $email = $data->email;
        $address = [ 
            [   'type' => 'alamat',
                'pref' => 'true',
                'street' => $data->rumah,
                'city' => '',
                'state' => '',
                'country' => '',
                'zip' => ''
            ]   
        ];
        $address = [ 
            [   'type' => 'perusahaan',
                'pref' => 'true',
                'street' => $data->perusahaan,
                'city' => '',
                'state' => '',
                'country' => '',
                'zip' => ''
            ]   
        ];
        $phone = [
            [
                'type' => 'work',
                'number' => $data->phone,
                'cellPhone' => true
            ],
        ];
        Alert::success('QR Berhasil Dibuat');
        $image = QRCode::vCard($firstname, $lastname, $title, $email, $address, $phone)
                    ->setErrorCorrectionLevel('H')
                    ->setSize(4)
                    ->setMargin(2)
                    ->svg();
        return $image;
    }

    public function edit($id)
    {
        $data = Data::find($id);

        return view('edit', [
            'data' => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = Data::find($id);
        $data->update($request->all());
        return redirect('/');
    }

    public function delete($id)
    {
        Data::find($id)->delete();
        return back();
    }

    public function cetak_pdf($id){
        $data = Data::findOrFail($id); 
        $firstname = $data->firstname;
        $lastname = $data->lastname;
        $title = $data->jabatan;
        $email = $data->email;
        $address = 
            [   'type' => 'alamat',
                'pref' => 'true',
                'street' => $data->rumah,
                'city' => '',
                'state' => '',
                'country' => '',
                'zip' => ''
            ]   
        ;
        $address = 
            [   'type' => 'perusahaan',
                'pref' => 'true',
                'street' => $data->perusahaan,
                'city' => '',
                'state' => '',
                'country' => '',
                'zip' => ''
            ]   
        ;
        $phone = 
            [
                'type' => 'work',
                'number' => $data->phone,
                'cellPhone' => true
            ]
        ;
        $newData = [
            'firstname' => $firstname,
            'lastname' => $lastname,
            'title' => $title,
            'email' => $email,
            'address' => $address,
            'phone' => $phone,
            'id' => $data->id,
        ];
        $pdf = PDF::loadview('data_pdf', ['newData' => $newData]);
    	return $pdf->download('QrCode.pdf');
    }
}