<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAnggotaRequest;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateAnggotaRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function index()
    {
        $customer = User::all();
        return view('admin.customer.index', compact('customer'));
    }

    public function create()
    {
        return view('admin.customer.create');
    }

    public function store(StoreCustomerRequest $request)
    {
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

        return redirect()->route('dataCustomer')->with('success', 'Customer berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $customer = User::findOrFail($id);
        return view('admin.customer.edit', compact('customer'));
    }

    public function update(UpdateCustomerRequest $request, $id)
    {
        $customer = User::findOrFail($id);
        $validated = $request->validated();

        if (empty($validated['password'])) {
            unset($validated['password']);
            unset($validated['password_confirmation']);
        } else {
            $validated['password'] = Hash::make($validated['password']);
        }

        $customer->update($validated);

        return redirect()->route('dataCustomer')->with('success', 'Customer berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $customer = User::findOrFail($id);
        $customer->delete();

        return redirect()->route('dataCustomer')->with('success', 'Customer berhasil dihapus.');
    }
}
