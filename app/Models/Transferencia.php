<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transferencia extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'transferencias';

    protected $fillable = [
        'conta_origem_id',
        'conta_destino_id',
        'data_hora',
        'valor',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'data_hora',
    ];

    public function conta(): BelongsTo
    {
        return $this->belongsTo(Conta::class);
    }
}
