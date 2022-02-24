<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use App\Models\DocumentImport;

class ImportDocument implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 100000;

    protected $file;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($file)
    {
        $this->file = $file;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $path = storage_path()."/app/import/".$this->file;
        $file = fopen($path,"r");
        $i = 0;
        while (($datos = fgetcsv($file)) !== false) {
            if($i != 0) {
                if(isset($datos[6])) {
                    $doc = new DocumentImport();
                    $doc->consecutive = $datos[0];
                    $doc->municipal_delegation = $datos[5];
                    $doc->address = json_encode($datos[1]);
                    $doc->colony = json_encode($datos[2]);
                    $doc->postal_code = $datos[3];
                    $doc->federal_entity = json_encode($datos[4]);
                    $doc->bar_code = $datos[6];
                    $doc->letter_type = substr($datos[6],0,3);
                    $doc->nss = substr($datos[6],3,11);
                    $doc->date_issue = substr($datos[6],14,8);
                    $doc->production_order = substr($datos[6],22,6);
                    $doc->event = substr($datos[6],28,1);
                    $doc->status_id = 1;
                    $doc->save();
                }
            }
            $i++;
        }
        fclose($file);
        $folder = explode("/", $this->file);
        Storage::disk('import')->deleteDirectory($folder[0]);
    }
}
