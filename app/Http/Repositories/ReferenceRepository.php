<?php

namespace App\Http\Repositories;

use App\Models\Reference;

class ReferenceRepository
{
    public function getAll()
    {
        return Reference::all();
    }

    public function find($id)
    {
        return Reference::find($id);
    }
}