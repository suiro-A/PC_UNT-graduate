<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'titulo',
        'autores',
        'resumen',
        'revista',
        'issn',
        'doi',
        'fecha_publicacion',
        'indexacion',
        'url',
        'archivo_pdf',
        'status',
        'observaciones',
        'submitted_at',
        'reviewed_at',
        'reviewed_by',
    ];

    protected function casts(): array
    {
        return [
            'submitted_at' => 'datetime',
            'reviewed_at' => 'datetime',
            'fecha_publicacion' => 'date',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }

    public function requests()
    {
        return $this->hasMany(Request::class);
    }
}
