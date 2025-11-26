<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAnggotaRequest;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateAnggotaRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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

    public function sendContact(Request $request)
{
    // Validasi
    $request->validate([
        'nama'    => 'required|string|max:255',
        'email'   => 'required|email',
        'telepon' => 'nullable|string|max:20',
        'subjek'  => 'required|string|max:255',
        'pesan'   => 'required|string|min:5',
    ]);

    // Simpan ke database
    ContactMessage::create([
        'nama'    => $request->nama,
        'email'   => $request->email,
        'telepon' => $request->telepon,
        'subjek'  => $request->subjek,
        'pesan'   => $request->pesan,
    ]);

    // Kirim email ke admin
    Mail::send('emails.contact', [
        'nama'    => $request->nama,
        'email'   => $request->email,
        'telepon' => $request->telepon,
        'subjek'  => $request->subjek,
        'pesan'   => $request->pesan,
    ], function ($message) use ($request) {
        $message->to('support@gadgetzone.id')
                ->subject('Pesan Kontak Baru: ' . $request->subjek);
    });

    return back()->with('success', 'Pesan berhasil dikirim! Kami akan segera menghubungi Anda.');
}
}
