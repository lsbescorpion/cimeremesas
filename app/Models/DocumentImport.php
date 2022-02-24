<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\Importable;


class DocumentImport extends Model
{
    use HasFactory,Importable;
    protected $table = 'documents_excel';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'consecutive',
        'bar_code',
        'colony',
        'address',
        'postal_code',
        'federal_entity',
        'municipal_delegation',
        'lat',
        'long',
        'letter_type',
        'nss',
        'date_issue',
        'production_order',
        'event',
        'status_id'
    ];

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }

}
