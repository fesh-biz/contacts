<?php

namespace App\Http\Controllers;

use App\Repositories\ContactRepository;
use Inertia\Inertia;
use Inertia\Response;

class ContactController extends Controller
{
    protected ContactRepository $contactRepository;

    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function index(): Response
    {
        $contacts = $this->contactRepository->all();

        return Inertia::render('Contact/Index', compact('contacts'));
    }
}
