<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    /**
     * Les attributs qui sont assignables en masse.
     *
     * @var array
     */
    protected $fillable = [
        'nom',
        'description',
        'prix',
        'user_id', // Si vous liez le produit à un utilisateur
        'image',
    ];

    /**
     * Les attributs qui doivent être castés à des types natifs.
     *
     * @var array
     */
    protected $casts = [
        'prix' => 'decimal:2',
    ];

    /**
     * Obtenir l'utilisateur propriétaire du produit.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

