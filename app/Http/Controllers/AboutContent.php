<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AboutContent extends Controller
{
    use \App\Traits\HandlesHeaders;

    /**
     * Returns the content of an about page based on its slug.
     *
     * @param string $slug The slug of the about page.
     * @return \Illuminate\Http\Response The response containing the content of the about page.
     */
    public function pageContent(string $slug): Response
    {
        $data = \App\Models\AboutContent::getBySlug($slug)->first();
        return $this->addHeaders(response($data), $data->count());
    }

    /**
     * Returns all the about content.
     *
     * @return \Illuminate\Http\Response The response containing the about content.
     */
    public function all(): Response
    {
        $data = \App\Models\AboutContent::all();
        return $this->addHeaders(response($data), $data->count());
    }

    /**
     * Returns a specific about content item.
     *
     * @param string $id The ID of the about content item.
     * @return \Illuminate\Http\Response The response containing the about content item.
     */
    public function data(string $id): Response
    {
        $data = \App\Models\AboutContent::find((int) $id);
        return $this->addHeaders(response($data), $data->count());
    }

    /**
     * Creates a new about content item.
     *
     * @param Request $request The request containing the data for the about content item.
     * @return Response The response containing the created about content item.
     */
    public function store(Request $request): Response
    {
        $data = $request->toArray();
        // \App\Helpers::log($data);
        $method = $data['method'];
        unset($data['method']);
        if ($method === 'edit') {
            $record = \App\Models\AboutContent::find((int) $data['id']);
        } else {
            $record = new \App\Models\AboutContent();
        }
        $record->content = $data['content'];
        $record->title = $data['title'];
        $record->href = $data['href'];
        $record->order = $data['order'];
        $record->topBar = !!$data['topBar'];
        $data['success'] = $record->save();

        return $this->addHeaders(response($data), 1);
    }

    public function remove(string $id): Response
    {
        $record = \App\Models\AboutContent::find((int) $id);
        $data = $record->delete();
        return $this->addHeaders(response($data), 1);
    }

    public function topBarLinks(): Response
    {
        $data = \App\Models\AboutContent::getHeadList()->get();
        return $this->addHeaders(response($data), count($data));
    }
}
