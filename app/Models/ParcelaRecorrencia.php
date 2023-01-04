<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ParcelaRecorrencia extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'parcelas_recorrencias';

    protected $fillable = [
        'movimentacao_financeira_id',
        'valor',
        'data_nascimento',
        'data_pagamento',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'data_nascimento',
        'data_pagamento',
    ];

    public function movimentacaoFinanceira(): BelongsTo
    {
        return $this->belongsTo(Movimentacao::class);
    }
}
