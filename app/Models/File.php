<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class File extends Model implements WithHeadingRow
{
    use HasFactory;
    protected $fillable = [
        'name',
        'file_path'
    ];
}
