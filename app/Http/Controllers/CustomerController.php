<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Mail\ContactMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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

        return redirect()->route('dataCustomer.index')
            ->with('success', 'Customer berhasil ditambahkan.');
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

        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $customer->update($validated);

        return redirect()->route('dataCustomer.index')
            ->with('success', 'Customer berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $customer = User::findOrFail($id);
        $customer->delete();

        return redirect()->route('dataCustomer.index')
            ->with('success', 'Customer berhasil dihapus.');
    }

    public function sendContact(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'telepon' => 'nullable',
            'subjek' => 'required',
            'pesan' => 'required',
        ]);

        Mail::to(env('MAIL_USERNAME'))->send(new ContactMail($data));

        return back()->with('success', 'Pesan Anda berhasil dikirim! Kami akan segera menghubungi Anda.');
    }
}
