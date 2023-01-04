<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Amigo extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'amigos';

    protected $fillable = [
        'user_id',
        'nome',
        'telefone',
        'foto',
        'limite_emprestimo',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function movimentacoesFinanceiras(): HasMany
    {
        return $this->hasMany(Movimentacao::class);
    }
}
