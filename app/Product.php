<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'price',
        'created_at',
        'updated_at',
        'deleted_at',
        'description',
    ];

    public function getConvertedPriceAttribute() {
        $price = $this->price;
        session(['selected_currency' => 'INR']);
        $selected_currency = session()->get('selected_currency');
        if( $selected_currency ){
            $price = $this->getExchangeRate($selected_currency);
        }
        return $price;

    }

    public function getExchangeRate($currency_code){
        $currency = Currency::where('code',$currency_code)->first();
        return $this->price * $currency->exchange_rate; 
    }
    
    public function getCurrencySymbolAttribute()
    {
        $symbol = '€';
        $selected_currency = session()->get('selected_currency');
        if( $selected_currency ){
            $currency = Currency::where('code',$currency_code)->first();
            $symbol   = $currency->symbol;
        }
        return $symbol;
    }

    
   
}
