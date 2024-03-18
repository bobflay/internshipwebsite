<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;


    // Assuming you have these fields in your model
    protected $fillable = ['user_id', 'type', 'amount','status' ,'balance_after'];

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($transaction) {
            // Retrieve the associated user's wallet
            $balance = Balance::where('user_id', $transaction->user_id)->get()->last();
            if(is_null($balance))
            {
                $balance = 0;
            }else{
                $balance = $balance->balance;
            }

            // Calculate the balance after based on the transaction type
            if ($transaction->type == 'deposit') {
                $transaction->balance_after = $balance + $transaction->amount;
            } elseif ($transaction->type == 'withdrawal') {
                $transaction->balance_after = $balance - $transaction->amount;
            }

            $transaction->status = 'pending';

            // $balance = Balance::create([
            //     'user_id'=>$transaction->user_id,
            //     'balance'=>$transaction->balance_after
            // ]);
        });
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
