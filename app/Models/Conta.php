<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Conta extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'contas';

    protected $fillable = [
        'user_id',
        'tipo',
        'nome_conta',
        'saldo',
        'ativo',
        'limite',
        'dia_fechamento',
        'dia_vencimento',
    ];

    protected $dates = [
        'dia_fechamento',
        'dia_vencimento',
        'created_at',
        'updated_at',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function transferencias(): HasMany
    {
        return $this->hasMany(Transferencia::class);
    }

    public function contas(): HasMany
    {
        return $this->hasMany(Conta::class);
    }
}
