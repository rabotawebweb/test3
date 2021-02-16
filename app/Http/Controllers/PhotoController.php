<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Note;
use View;
use Validator;
use Input;
use Session;
use Redirect;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $photos = Note::all();
		
        return View::make('photos.index')
            ->with('photos', $photos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		return View::make('photos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rules = array(
            'title'       => 'required',
            'author'      => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('photos/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $photo = new Note;
            $photo->title       = Input::get('title');
            $photo->author      = Input::get('author');
			$photo->body        = '';
            $photo->save();

            // redirect
            Session::flash('message', 'Successfully created photo!');
            return Redirect::to('photos');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
		$photo = Note::find($id);

        // show the view and pass the nerd to it
        return View::make('photos.show')
            ->with('photo', $photo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
		$photo = Note::find($id);

        // show the edit form and pass the nerd
        return View::make('photos.edit')
            ->with('photo', $photo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
		// read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'title'       => 'required',
            'author'      => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('photos/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $photo = Note::find($id);
            $photo->title       = Input::get('title');
            $photo->author      = Input::get('author');
            $photo->body        = '';
            $photo->save();

            // redirect
            Session::flash('message', 'Successfully updated nerd!');
            return Redirect::to('photos');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
		// delete
        $photo = Note::find($id);
        $photo->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the nerd!');
        return Redirect::to('photos');
    }
}
