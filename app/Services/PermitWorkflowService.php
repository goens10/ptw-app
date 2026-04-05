<?php

namespace App\Services;

use App\Models\Permit;

class PermitWorkflowService
{
    public function submit(Permit $permit)
    {
        $this->ensureStatus($permit, 'draft');

        $permit->update(['status' => 'submitted']);
        return $permit;
    }

    public function validate(Permit $permit)
    {
        $this->ensureStatus($permit, 'submitted');

        $permit->update(['status' => 'validated']);
        return $permit;
    }

    public function print(Permit $permit)
    {
        $this->ensureStatus($permit, 'validated');

        $permit->update([
            'status' => 'printed',
            'ptw_number' => $this->generateNumber(),
            'printed_at' => now()
        ]);

        return $permit;
    }

    public function issue(Permit $permit)
    {
        $this->ensureStatus($permit, 'printed');

        $permit->update([
            'status' => 'issued',
            'issued_at' => now()
        ]);

        return $permit;
    }

    public function close(Permit $permit)
    {
        $this->ensureStatus($permit, 'issued');

        $permit->update([
            'status' => 'closed',
            'closed_at' => now()
        ]);

        return $permit;
    }

    private function ensureStatus(Permit $permit, $expected)
    {
        if ($permit->status !== $expected) {
            throw new \InvalidArgumentException("Invalid transition from {$permit->status}");
        }
    }

    private function generateNumber()
    {
        return 'PTW-' . now()->format('YmdHis') . '-' . rand(100,999);
    }
}