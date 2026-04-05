<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permit;
use App\Http\Requests\StorePermitRequest;
use App\Http\Requests\UpdatePermitRequest;
use App\Services\PermitService;

class PermitController extends Controller
{
    protected $permitService;

    public function __construct(PermitService $permitService)
    {
        $this->permitService = $permitService;
    }

    public function index(Request $request)
    {
        $query = Permit::query();

        if ($request->search) {
            $query->where('permit_number', 'like', '%' . $request->search . '%')
                ->orWhere('request_by', 'like', '%' . $request->search . '%')
                ->orWhere('section', 'like', '%' . $request->search . '%');
        }

        $permits = $query->latest()->paginate(5)->withQueryString();

        return view('permit.index', compact('permits'));
    }

    public function create()
    {
        return view('permit.create');
    }

    public function store(StorePermitRequest $request)
    {
        $this->permitService->store($request->validated());

        return redirect()->route('permits.index')
            ->with('success', 'Permit berhasil ditambahkan');
    }

    public function edit($id)
    {
        $permit = Permit::findOrFail($id);
        return view('permit.edit', compact('permit'));
    }

    public function update(UpdatePermitRequest $request, $id)
    {
        $this->permitService->update($id, $request->validated());

        return redirect()->route('permits.index')
            ->with('success', 'Permit berhasil diupdate');
    }

    public function destroy($id)
    {
        $this->permitService->update($id, $request->validated());

        return redirect()->route('permits.index')
            ->with('success', 'Permit berhasil dihapus');
    }
}
