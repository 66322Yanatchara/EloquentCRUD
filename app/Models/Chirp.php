<?php

namespace App\Models;
use App\Events\ChirpCreated;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chirp extends Model
{
    // จะให้ใส่ขอมูลอะไรได้บ้างถ้าไม่ใส่จะยังinsertอะไรไม่ได้จะไม่ให้ยุ่ง
    protected $fillable = [
        'message',
    ];

    protected $dispatchesEvents = [
        'created' => ChirpCreated::class,
    ];
    
    public function user(): BelongsTo //-ขึ้นอยู่กับuserของใครของมัน
    {
        return $this->belongsTo(User::class);
    }
}
