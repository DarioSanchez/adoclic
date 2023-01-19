<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static whereBetween(string $string, array $array)
 */
class UserStats extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'views',
        'clicks',
        'conversions',
        'date',
    ];


    public static function getStats( $dateFrom, $dateTo, $totalClicks)
    {
       return self::Join('users as u','user_stats.user_id', "=", "u.id")
           ->whereBetween('date', [$dateFrom, $dateTo])
           ->where('clicks', ">=", $totalClicks)
           ->get();
    }


}