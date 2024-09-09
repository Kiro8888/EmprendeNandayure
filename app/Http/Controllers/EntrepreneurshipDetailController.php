<?php
// app/Http/Controllers/EntrepreneurshipDetailController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entrepreneurship;

class EntrepreneurshipDetailController extends Controller
{
    public function show($id)
    {
        $entrepreneurship = Entrepreneurship::findOrFail($id);

        return view('entrepreneurshipsdetails.show', compact('entrepreneurship'));
    }
}
