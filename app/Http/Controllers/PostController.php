<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Support\Str;

class PostController extends Controller
{
    protected $modal;

    public function __construct()
    {
        $this->modal = new Post();
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): object|array
    {
        $data = $this->modal->get()->toArray();

        return returnResponse(200,$data,"post list");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $data = $this->modal->create($request->prepareRequest());

        return returnResponse(200,$data,"Post successfully created.");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
