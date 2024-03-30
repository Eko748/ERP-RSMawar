<?php

namespace App\Models;

use CodeIgniter\Model;

class KandidatModel extends Model
{
    protected $table      = 'tbh_kandidat';
    protected $primaryKey = 'id_kandidat';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = [
        'nama', 'email', 'alamat', 'telepon', 'resume',
        'created_at', 'updated_at', 'delete_at'
    ];

    protected $belongsToMany = [
        'lowongan' => [
            'table' => 'tbh_kandidat_lowongan',
            'model' => 'LowonganModel',
            'fk'    => 'id_kandidat',
            'relatedKey' => 'id_lowongan_kerja',
            'useTimestamps' => true,
        ],
    ];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
