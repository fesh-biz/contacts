<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Contact;

class ContactRepository extends Repository
{
    public function __construct(Contact $contact)
    {
        parent::__construct($contact);
    }

    public function all(): Collection
    {
        return $this->model->select(['id', 'name'])->get();
    }
}