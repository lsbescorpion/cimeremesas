<?php

namespace App\Http\Controllers;

use App\Imports\DocumentsCollectionImport;
use App\Models\DocumentImport;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Excel;
use App\Imports\DocumentsImport;
use Illuminate\Support\Facades\Storage;
use Jstewmc\Rtf\Document;
use App\Jobs\ImportDocument;

use Jstewmc\Rtf\Element\Text;

class ExcelController extends Controller
{


    private $excel;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = DocumentImport::with(['status'])->get();
        //$documents = [];
        return view('import.index', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('import.excel_details');
    }

    /**
     * Show the form for creating a new resource for check.
     *
     * @return \Illuminate\Http\Response
     */
    public function check()
    {



        return view('import.check');

    }

    public function verify(Request $request)
    {
         $this->excel->import(new DocumentsCollectionImport, $request->file('excel_file'));

        $documents = DocumentImport::join('document_status','document_status.id','=','documents_excel.status_id')->get();

        return view('import.index', compact('documents'));

    }

    public function __construct(Excel $excel)
    {
        $this->excel = $excel;
    }

    public function import(Request $request)
    {

        return (new DocumentsImport)->import($request->file('excel_file'));


    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        /*$filenamewithextension = $request->file('docs');
        //get filename without extension
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        $document2 = new Document($filenamewithextension);
        $document2 = preg_replace('"{\*?\\\\.+(;})|\\s?\\\[A-Za-z0-9]+|\\s?{\\s?\\\[A-Za-z0-9‹]+\\s?|\\s?}\\s?"', '', $document2);



        $fichero = json_encode(array( $document2));
        $ficheros[]= json_decode($fichero,true);
        $d=explode(",",$document2, 7);
        $data=explode('" "',$d[6]);
        $ver[]= array();
        for ($a=1;$a<count($data);$a++) {
            list($consecutive[$a], $address[$a], $colony[$a], $postal_code[$a], $federal_entity[$a], $municipal_delegation[$a], $bar_code[$a])=  explode(",", $data[$a]);

        }


        for ($i=1;$i<count($data);$i++) {
            $bar_code[$i]=substr($bar_code[$i],1);

            $elementImport = DocumentImport::where('bar_code','=',$bar_code[$i])->count();
            if($elementImport==0) {
                DocumentImport::create([
                    'consecutive' => $consecutive[$i],
                    'municipal_delegation' => $municipal_delegation[$i],
                    'address' => $address[$i],
                    'colony' => $colony[$i],
                    'postal_code' => $postal_code[$i],
                    'federal_entity' => $federal_entity[$i],
                    'bar_code' => $bar_code[$i],
                    'letter_type'=>$this->strSplit($bar_code[$i],0,3),
                    'nss'=>$this->strSplit($bar_code[$i],3,11),
                    'date_issue'=>$this->strSplit($bar_code[$i],14,8),
                    'production_order'=>$this->strSplit($bar_code[$i],22,6),
                    'event'=>$this->strSplit($bar_code[$i],28,1),
                    'status_id'=>2


                ]);
            }

        }*/
        $files = Storage::disk('import')->files($request->get('folder'));
        if($files != null && count($files) > 0) {
            dispatch(new ImportDocument($files[0]));
        }
        //$documents = DocumentImport::All();
        return redirect()->route('imports.index');
        //return view('import.index', compact('documents'));
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
    public function update(Request $request, $id)
    {
        //
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

    public function getCoordinates($address)
    {
        $address = urlencode($address);
        $queryString = http_build_query ([ 'access_key' => '5f30059b01094eae5afba4d42abaada2' , 'query' => '1600 Pennsylvania Ave NW' , 'region' => 'Washington' , 'output' => 'json' , 'limit' => 1 , ]);







        $ch = curl_init ( sprintf ( '%s?%s' , 'https://api.positionstack.com/v1/forward' , $queryString ));
        curl_setopt ( $ch , CURLOPT_RETURNTRANSFER , true );

        $json = curl_exec ( $ch );

        curl_close ( $ch );

        $apiResult = json_decode ( $json , true );
        var_dump($apiResult);
        die('as');
        imprimir_r ( $apiResult
        ) ;
    }
    public function postMap(Request $request)
    {
        $general_settings = GeneralSettings::select('map_key')->first();
        if ($general_settings == Null || $general_settings->map_key == Null) {
            return "";
        }

        //$server_key = $general_settings->map_key;
        $server_key = "AIzaSyALPuczVRWMVSwYSepUwUWEl6TPDPkQavU";
        $url = $request->get('url');
        if ($url == Null) {
            return "";
        }
        $fcmUrl = $url . $server_key;
        $final_url = str_replace(' ', '%20', $fcmUrl);

        $fcmData = [];
        $headers = [
//            'Authorization: key=' . $server_key,
            'Content-Type: application/json'
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $final_url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmData));
        $result = curl_exec($ch);
        curl_close($ch);

        $response = json_decode($result, true);


        return response()->json([
            "status" => 1,
            "message" => 'success!',
            "message_code" => 1,
            'data'=>[
                $response]]);
    }

    public function strSplit($string,$start,$limit)
    {
    $str=substr($string,$start,$limit);

    return $str;

    }

    public function uploadFiles(Request $request) {
        $folder = time();
        Storage::disk('import')->putFileAs($folder, $request->file('file'), $request->file('file')->getClientOriginalName());
        return response()->json($folder);
    }

    public function removeFiles(Request $request) {
        Storage::disk('import')->deleteDirectory($request->get('dir'));
        return response()->json("Remove");
    }

}
