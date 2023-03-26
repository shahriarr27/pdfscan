<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkersCompensation extends Model
{
    use HasFactory;
    public function pdfScan()
    {
        return $this->belongsTo(pdfScan::class);
    }
}
