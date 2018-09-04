<?php

namespace App\Http\Controllers;

use App\Http\Controllers\JoshController;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use File;
use Hash;
use Illuminate\Support\Facades\Mail;
use Redirect;
use Sentinel;
use URL;
use View;
use Yajra\DataTables\DataTables;
use Validator;
Use App\Mail\Restore;

use Illuminate\Http\Request;
use App\Template;

class TemplateController extends JoshController
{
    /**
     * Show a list of all the template.
     *
     * @return View
     */

    public function index()
    {
        // Show the page
        return view('templates.index', compact('templates'));
    }

    /*
     * Pass data through ajax call
     */
    /**
     * @return mixed
     */
    public function data()
    {
        $templates = Template::get(['id', 'background_image', 'header_title_en', 'header_title_fr', 'form_template', 'description_en', 'description_fr', 'form_id', 'assign_value']);

        return DataTables::of($templates)
            ->addColumn('actions',function($template) {
                $actions = '<a href='. route('templates.assign', $template->id) .'><i class="livicon" data-name="check" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Select this Template"></i></a>
                            <a href='. route('templates.edit', $template->id) .'><i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="update template"></i></a>';
                $actions .= '<a href='. route('templates.confirm-delete', $template->id) .' data-id="'.$template->id.'" data-toggle="modal" data-target="#delete_confirm"><i class="livicon" data-name="template-remove" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete template"></i></a>';
                return $actions;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    /**
     * Create new user
     *
     * @return View
     */
    public function create()
    {
        // Show the page
        return view('templates.create');
    }

    /**
     * Template create form processing.
     * @param $request Request
     *
     * @return Redirect
     */
    public function store(Request $request)
    {
        //upload image for header
        if ($file = $request->file('background_image')) {
            $extension = $file->extension()?: 'png';
            $destinationPath = public_path() . '/uploads/headers/';
            $safeName = str_random(10) . '.' . $extension;
            $file->move($destinationPath, $safeName);
            $pic_path = $safeName;
        }

        try {
            // Register the user
            $template = new Template();

            $template->background_image = $pic_path;
            $template->header_title_en = $request['header_title_en'];
            $template->header_title_fr = $request['header_title_fr'];
            $template->form_template = $request['form_template'];
            $template->form_id = $request['form_id'];
            $template->description_en = Template::strip_tags_content($request['description_en'], '<div><p><li><a><ul><ol><h1><h2><h3><h4>');
            $template->description_fr = Template::strip_tags_content($request['description_fr'], '<div><p><li><a><ul><ol><h1><h2><h3><h4>');
            $template->assign_value = false;

            $template->save();

            // Redirect to the home page with success menu
            return Redirect::route('templates.index')->with('success', trans('templates/message.success.create'));

        } catch (LoginRequiredException $e) {
            $error = trans('templates/message.template_login_required');
        } catch (PasswordRequiredException $e) {
            $error = trans('templates/message.template_password_required');
        } catch (Exception $e) {
            $error = trans('templates/message.template_exists');
        }

        // Redirect to the user creation page
        return Redirect::back()->withInput()->with('error', $error);
    }

    /**
     * Template selection update.
     *
     * @param  int $id
     * @return Redirect
     */
    public function assign(int $id) {
        //assign false on all template then assign true to the selected one
        $templates = Template::all();
        foreach ($templates as $t) {
            $t->assign_value=  false;
            $t->save();
        }

        $template = Template::find($id);
        $template->assign_value = true;
        $template->save();

        $success = trans('templates/message.success.update');
        return Redirect::route('templates.index')->with('success', $success);
    }

    /**
     * Template update.
     *
     * @param  int $id
     * @return View
     */
    public function edit(Template $template)
    {
        // Show the page
        return view('templates.edit', compact('template'));
    }

    /**
     * Template update form processing page.
     *
     * @param  Template $template
     * @param TemplateRequest $request
     * @return Redirect
     */
    public function update(Template $template, Request $request)
    {

        try {
            $request['description'] = Template::strip_tags_content($request['description_en'], '<div><p><li><a><ul><ol><h1><h2><h3><h4>');
            $template->update($request->all());

            //save record
            $template->save();

            // Was the user updated?
            if ($template->save()) {
                // Prepare the success message
                $success = trans('templates/message.success.update');

                // Redirect to the user page
                return Redirect::route('templates.edit', $template)->with('success', $success);
            }

            // Prepare the error message
            $error = trans('templates/message.error.update');
        } catch (NotFoundException $e) {
            // Prepare the error message
            $error = trans('templates/message.template_not_found', compact('id'));

            // Redirect to the user management page
            return Redirect::route('templates.index')->with('error', $error);
        }

        // Redirect to the user page
        return Redirect::route('templates.edit', $template)->withInput()->with('error', $error);
    }

    /**
     * Delete Confirm
     *
     * @param   int $id
     * @return  View
     */
    public function getModalDelete($id)
    {
        $model = 'templates';
        $confirm_route = $error = null;
        try {
            // Get user information
            $template = Template::find($id);

            return view('layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = trans('users/message.user_not_found', compact('id'));
            return view('layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
        }
        $confirm_route = route('templates.delete', ['id' => $template->id]);
        return view('layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
    }

    /**
     * Delete the given template.
     *
     * @param  int $id
     * @return Redirect
     */
    public function destroy($id)
    {

        try {
            // Get user information
            $template = Template::find($id);

            // Delete the template
            //to allow soft deleted, we are performing query on templates model instead of Sentinel model
            Template::destroy($id);
            // Prepare the success message
            $success = trans('templates/message.success.delete');

            // Redirect to the user management page
            return Redirect::route('templates.index')->with('success', $success);
        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = trans('templates/message.template_not_found', compact('id'));

            // Redirect to the user management page
            return Redirect::route('templates.index')->with('error', $error);
        }
    }
}
