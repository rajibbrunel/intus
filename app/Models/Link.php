<?php
/* Model for Link Object */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;
    protected $fillable = [

        'short_url', // no need to create short url for problematic 
        'shortcode',
        'hashvalue', // hash value just holding hash of plain url without protocol
        'protocol',
        'originalurl',
        'safe',
        'errormessage',
        'safe_api_response',
        'last_check'
    ];
}
