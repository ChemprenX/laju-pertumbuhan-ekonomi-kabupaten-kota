<?php

namespace Bantenprov\LpeKabupatenKota\Models\Bantenprov\LpeKabupatenKota;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LpeKabupatenKota extends Model
{

    protected $table = 'lpe_kabupaten_kotas';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('negara', 'province_id', 'kab_kota', 'regency_id', 'tahun', 'data');

    public function getProvince()
    {
        return $this->hasOne('Bantenprov\LpeKabupatenKota\Models\Bantenprov\LpeKabupatenKota\Province','id','province_id');
    }

    public function getRegency()
    {
        return $this->hasOne('Bantenprov\LpeKabupatenKota\Models\Bantenprov\LpeKabupatenKota\Regency','id','regency_id');
    }

}

