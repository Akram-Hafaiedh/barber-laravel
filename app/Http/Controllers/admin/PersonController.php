<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePersonRequest;
use App\Models\Location;
use App\Models\Person;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PersonController extends Controller
{
    public function index(): View
    {
        $people = Person::paginate(10);
        return view('admin.people.index', compact('people'));
    }
    public function create(): View
    {
        $services = Service::all();
        $locations = Location::all();
        $roles = Person::ROLES;
        return view('admin.people.create', compact('services', 'locations', 'roles'));
    }

    public function store(StorePersonRequest $request): RedirectResponse
    {
        Person::create($request->validated());
        return redirect()->route('admin.people.index');
    }
}
