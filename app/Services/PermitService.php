<?php

namespace App\Services;

use App\Models\Permit;

class PermitService
{
    public function store(array $data)
    {
        return Permit::create($data);
    }

    public function update($id, array $data)
    {
        $permit = Permit::findOrFail($id);
        $permit->update($data);

        return $permit;
    }

    public function delete($id)
    {
        $permit = Permit::findOrFail($id);
        return $permit->delete();
    }
}