<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ContactStoreRequest;
use App\Http\Requests\ContactUpdateRequest;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Contact::class);

        $search = $request->get('search', '');

        $contacts = Contact::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.contacts.index', compact('contacts', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Contact::class);

        return view('app.contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Contact::class);

        $validated = $request->validated();

        if ($request->hasFile('favicon')) {
            if ($contact->favicon) {
                Storage::delete($contact->favicon);
            }
            $validated['favicon'] = $request->file('favicon')->store('public');
            $fileName1 = basename($validated['favicon']);

            $request->file('favicon')->move(public_path('storage'), $fileName1);
        }

        if ($request->hasFile('logo1')) {
            if ($contact->logo1) {
                Storage::delete($contact->logo1);
            }
            $validated['logo1'] = $request->file('logo1')->store('public');
            $fileName1 = basename($validated['logo1']);

            $request->file('logo1')->move(public_path('storage'), $fileName1);
        }


        if ($request->hasFile('logo2')) {
            if ($contact->logo2) {
                Storage::delete($contact->logo2);
            }
            $validated['logo2'] = $request->file('logo2')->store('public');
            $fileName1 = basename($validated['logo2']);

            $request->file('logo2')->move(public_path('storage'), $fileName1);
        }

        $contact = Contact::create($validated);

        return redirect()
            ->route('contacts.edit', $contact)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Contact $contact): View
    {
        $this->authorize('view', $contact);

        return view('app.contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Contact $contact): View
    {
        $this->authorize('update', $contact);

        return view('app.contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        ContactUpdateRequest $request,
        Contact $contact
    ): RedirectResponse {
        $this->authorize('update', $contact);

        $validated = $request->validated();

        if ($request->hasFile('favicon')) {
            if ($contact->favicon) {
                Storage::delete($contact->favicon);
            }
            $validated['favicon'] = $request->file('favicon')->store('public');
            $fileName1 = basename($validated['favicon']);

            $request->file('favicon')->move(public_path('storage'), $fileName1);
        }

        if ($request->hasFile('logo1')) {
            if ($contact->logo1) {
                Storage::delete($contact->logo1);
            }
            $validated['logo1'] = $request->file('logo1')->store('public');
            $fileName1 = basename($validated['logo1']);

            $request->file('logo1')->move(public_path('storage'), $fileName1);
        }


        if ($request->hasFile('logo2')) {
            if ($contact->logo2) {
                Storage::delete($contact->logo2);
            }
            $validated['logo2'] = $request->file('logo2')->store('public');
            $fileName1 = basename($validated['logo2']);

            $request->file('logo2')->move(public_path('storage'), $fileName1);
        }

        // dd($fileName1);

        $contact->update($validated);

        return redirect()
            ->route('contacts.edit', $contact)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Contact $contact
    ): RedirectResponse {
        $this->authorize('delete', $contact);

        if ($contact->logo1) {
            Storage::delete($contact->logo1);
        }

        if ($contact->logo2) {
            Storage::delete($contact->logo2);
        }

        $contact->delete();

        return redirect()
            ->route('contacts.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
