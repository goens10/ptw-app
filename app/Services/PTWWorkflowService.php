<?php

class PTWWorkflowService
{
    public function submit($ptw)
    {
        if ($ptw->status !== 'draft') {
            throw new \Exception('Invalid transition');
        }

        $ptw->update(['status' => 'submitted']);
    }

    public function validate($ptw)
    {
        if ($ptw->status !== 'submitted') {
            throw new \Exception('Invalid transition');
        }

        $ptw->update(['status' => 'validated']);
    }

    public function print($ptw)
    {
        if ($ptw->status !== 'validated') {
            throw new \Exception('Invalid transition');
        }

        $ptw->update([
            'status' => 'printed',
            'ptw_number' => 'PTW-' . now()->format('YmdHis'),
            'printed_at' => now()
        ]);
    }
}