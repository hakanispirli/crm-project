<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Artist;
use App\Models\Customers;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'customer_id',
        'artist_id',
        'start',
        'end',
        'description',
        'on_odeme',
        'toplam_odeme',
        'service_id',
        'dovme_modeli'
        ];

    public function artist(){
        return $this->belongsTo(Artist::class);
    }

    public function customer(){
        return $this->belongsTo(Customers::class);
    }

    public function service(){
        return $this->belongsTo(Service::class);
    }

    public function smsTemplate(){
        return $this->belongsTo(SmsTemplate::class);
    }

    public function smsTemplates()
    {
        return $this->hasMany(SMSTemplate::class);
    }
}
