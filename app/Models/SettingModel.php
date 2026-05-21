<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingModel extends Model
{
    protected $table            = 'settings';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $useAutoIncrement = true;
    protected $useTimestamps    = true;
    protected $allowedFields    = [
        'setting_key',
        'setting_value',
    ];

    public function getMap(): array
    {
        $settings = [];

        foreach ($this->findAll() as $row) {
            $settings[$row['setting_key']] = $row['setting_value'];
        }

        return $settings;
    }

    public function upsertMany(array $data): void
    {
        foreach ($data as $key => $value) {
            $existing = $this->where('setting_key', $key)->first();
            $payload = [
                'setting_key'   => $key,
                'setting_value' => $value,
            ];

            if ($existing) {
                $this->update($existing['id'], $payload);
                continue;
            }

            $this->insert($payload);
        }
    }
}
