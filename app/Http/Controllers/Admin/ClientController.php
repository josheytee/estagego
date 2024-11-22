<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\Upload;
use Illuminate\View\View;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    use Upload;

    public function index(Request $request): View
    {
        $clients = Client::all();
        return view('admin.pages.clients.index', compact('clients'));
    }


    public function create(Request $request)
    {
        $model = new Client();
        return view('admin.pages.clients.create', compact('model'));
    }

    public function show(Request $request, Client $scheduleInterview)
    {
        // return view('scheduleInterview.show', compact('scheduleInterview'));
    }

    public function edit(Request $request, Client $client)
    {
        $model = $client;
        return view('admin.pages.clients.edit', compact('model'));
    }

    public function update(Request $request, Client $client)
    {
        // dd($request->all(), $request->hasFile('image'));
        $client->update($request->all());

        if ($imagePath = $this->uploadImage($request, 'clients', \Str::slug($client->id) . '_' . \Str::slug($client->name))) {
            if ($image = $client->images()->where('imageable_id', $client->id)->first()) {
                $image->update([
                    'path' => $imagePath
                ]);
            } else {
                $client->images()->create([
                    'path' => $imagePath
                ]);
            }
        }
        return redirect()->route('admin.clients.index');
    }

    public function destroy(Request $request, Client $client)
    {
        $client->delete();

        return redirect()->route('admin.clients.index');
    }

    public function store(Request $request)
    {
        // dd($request->all() + ['proffession' => null]);
        $client = Client::create($request->all());

        if ($imagePath = $this->uploadImage($request, 'clients', \Str::slug($client->title) . '_' . \Str::slug($client->name))) {
            if ($image = $client->images()->where('imageable_id', $client->id)->first()) {
                $client->images()->create([
                    'path' => $imagePath
                ]);
            }
        }
        if (isset($client->id))
            return redirect()->route('admin.clients.index');
        else
            return redirect()->route('admin.clients.create');
    }
}
