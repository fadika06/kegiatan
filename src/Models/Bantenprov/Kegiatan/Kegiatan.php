<?php

namespace Bantenprov\Kegiatan\Models\Bantenprov\Kegiatan;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kegiatan extends Model
{
    use SoftDeletes;

    public $timestamps = true;

    protected $table = 'kegiatans';
    protected $dates = [
        'deleted_at'
    ];
    protected $fillable = [
        'label',
        'description'
    ];
}
