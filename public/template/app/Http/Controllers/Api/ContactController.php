<?php

namespace App\Http\Controllers\Api;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\ContactResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\ContactCollection;
use App\Http\Requests\ContactStoreRequest;
use App\Http\Requests\ContactUpdateRequest;

class ContactController extends Controller
{
    public function index(Request $request): ContactCollection
    {
        $this->authorize('view-any', Contact::class);

        $search = $request->get('search', '');

        $contacts = Contact::search($search)
            ->latest()
            ->paginate();

        return new ContactCollection($contacts);
    }

    public function store(ContactStoreRequest $request): ContactResource
    {
        $this->authorize('create', Contact::class);

        $validated = $request->validated();
        if ($request->hasFile('logo1')) {
            $validated['logo1'] = $request->file('logo1')->store('public');
        }

        if ($request->hasFile('logo2')) {
            $validated['logo2'] = $request->file('logo2')->store('public');
        }

        $contact = Contact::create($validated);

        return new ContactResource($contact);
    }

    public function show(Request $request, Contact $contact): ContactResource
    {
        $this->authorize('view', $contact);

        return new ContactResource($contact);
    }

    public function update(
        ContactUpdateRequest $request,
        Contact $contact
    ): ContactResource {
        $this->authorize('update', $contact);

        $validated = $request->validated();

        if ($request->hasFile('logo1')) {
            if ($contact->logo1) {
                Storage::delete($contact->logo1);
            }

            $validated['logo1'] = $request->file('logo1')->store('public');
        }

        if ($request->hasFile('logo2')) {
            if ($contact->logo2) {
                Storage::delete($contact->logo2);
            }

            $validated['logo2'] = $request->file('logo2')->store('public');
        }

        $contact->update($validated);

        return new ContactResource($contact);
    }

    public function destroy(Request $request, Contact $contact): Response
    {
        $this->authorize('delete', $contact);

        if ($contact->logo1) {
            Storage::delete($contact->logo1);
        }

        if ($contact->logo2) {
            Storage::delete($contact->logo2);
        }

        $contact->delete();

        return response()->noContent();
    }
}
