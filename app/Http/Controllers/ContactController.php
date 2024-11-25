<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Repositories\ContactRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ContactController extends Controller
{
    protected ContactRepository $contactRepository;

    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $contacts = $this->contactRepository->all();

        return Inertia::render('Contact/Index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('Contact/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactRequest $r): RedirectResponse
    {
        $this->contactRepository->create([
            'name' => $r->name,
            'email' => $r->email,
            'phone' => $r->phone
        ]);

        return redirect()->route('contacts.index')
            ->with('message', 'Contact created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contact = $this->contactRepository->findOrFail($id);

        return Inertia::render('Contact/Show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        $contact = $this->contactRepository->findOrFail($id);

        return Inertia::render('Contact/Edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContactRequest $r, string $id): RedirectResponse
    {
        $this->contactRepository->update($id, [
            'name' => $r->name,
            'email' => $r->email,
            'phone' => $r->phone
        ]);

        return redirect()->route('contacts.index')
            ->with('message', 'Contact updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
