<?php

namespace App\Http\Controllers;

use App\ApiResponse;
use App\Http\Requests\StoreBranchRequest;
use App\Http\Requests\UpdateBranchRequest;
use App\Models\Branch;
use App\Models\Branch\DeleteBranchAction;
use CreateBranchAction;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use UpdateBranchAction;

class BranchController extends Controller
{
    use ApiResponse, AuthorizesRequests;

    public function index()
    {
        // $this->authorize('viewAny', Branch::class);
        $branches = Branch::latest()->paginate(10);
        return $this->successResponse($branches);
    }

    public function show(Branch $branch)
    {
        $this->authorize('view', $branch);
        return $this->successResponse($branch);
    }

    public function store(StoreBranchRequest $request, CreateBranchAction $action)
    {
        $this->authorize('create', Branch::class);
        $branch = $action->execute($request->validated());
        return $this->successResponse($branch, 'Data cabang berhasil dibuat', 201);
    }

    public function update(UpdateBranchRequest $request, Branch $branch, UpdateBranchAction  $action)
    {
        $this->authorize('update', $branch);
        $updatedBranch = $action->execute($branch, $request->validated());
        return $this->successResponse($updatedBranch, 'Data cabang berhasil diperbarui');
    }

    public function destroy(Branch $branch, DeleteBranchAction $action)
    {
        $this->authorize('delete', $branch);
        $action->execute($branch);
        return $this->successResponse(null, 'Data cabang berhasil dihapus');
    }
}