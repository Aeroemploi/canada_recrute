<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2018-07-31
 * Time: 15:57
 */

namespace App\Http\Controllers;

use App\BaseForm;
use App\Form;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Redirect;

class FormsController
{

    public function index()
    {
        // Show the page
        return view('forms.index');
    }

    public function data()
    {
        $forms = BaseForm::get(['id', 'form_id', 'route', 'method', 'form_identifier', 'form_enctype', 'form_header_fr', 'form_header_en']);

        return DataTables::of($forms)
            ->addColumn('actions',function($form) {
                $actions = '<a href='. route('forms.edit', $form->form_id) .'><i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="update Form"></i></a>';
                $actions .= '<a href='. route('forms.confirm-delete', $form->form_id) .' data-id="'.$form->form_id.'" data-toggle="modal" data-target="#delete_confirm"><i class="livicon" data-name="template-remove" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete Form"></i></a>';
                return $actions;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function addFormControl(Request $request) {
        $data = $request->all();
        return view('forms.controls', compact('data'));
    }

    public function create()
    {
        // Show the page
        return view('forms.create');
    }

    /**
     * Form create form processing.
     * @param $request Request
     *
     * @return /Redirect
     */
    public function store(Request $request)
    {
        //we will save the base form info first
        $base_form_info = new BaseForm();
        $iteration = $request['_iteration'];
        $form_field_array = [];

        try {
            $base_form_info->form_id = $request['base_form_id'];
            $base_form_info->route = $request['route'];
            $base_form_info->method = $request['method'];
            $base_form_info->form_identifier = $request['form_identifier'];
            $base_form_info->form_enctype = $request['form_enctype'];
            $base_form_info->form_header_fr = $request['form_header_fr'];
            $base_form_info->form_header_en = $request['form_header_en'];
            $base_form_info->save();

            for ($i=1; $i<=$iteration; $i++) {
                $form_field = new Form();
                if($request['form_id_' . $i] !== $base_form_info->form_id) {
                    throw new \Exception('not the same form id as the base form info one');
                }
                $form_field->form_id = $request['form_id_' . $i];
                $form_field->input_id = $request['input_id_' . $i];
                $form_field->input_type = $request['input_type_' . $i];
                $form_field->input_name = $request['input_name_' . $i];
                $form_field->label_title = $request['label_title_' . $i];
                $form_field->primary_color = $request['primary_color_' . $i];
                $form_field_array[] = $form_field;
            }

            foreach ($form_field_array as $form_field) {
                $form_field->save();
            }

            // Redirect to the home page with success menu
            return Redirect::route('forms.index')->with('success', trans('forms/message.success.create'));
        } catch (\Exception $e) {
            $error = trans('forms/message.error.generic');
        }
        return Redirect::route('forms.index')->with('error', $error);
    }

    /**
     * Template update.
     *
     * @param  int $id
     * @return Mixed
     */
    public function edit($id)
    {
        $base_form = BaseForm::where('form_id', $id)->take(1)->get();
        $forms_field = Form::where('form_id', $id)->get();
        $numberOfField = $forms_field->count();
        $data = array();
        $data['numberOfElement'] = 1;

        if($base_form === null)
            return Redirect::route('forms.index')->with('error', trans('forms/message.error.generic'));

        // Show the page
        return view('forms.edit', [
            'base_form' => $base_form,
            'forms_field' => $forms_field,
            'numberOfField' => $numberOfField,
            'data' => $data
            ]);
    }

    /**
     * Template update form processing page.
     *
     * @param  Integer $form_id
     * @param TemplateRequest $request
     * @return Redirect
     */
    public function update(int $form_id, Request $request)
    {
        //we will save the base form info first
        $base_form_info = BaseForm::where('form_id', $form_id)->get();
        $base_form = $base_form_info[0];
        $form_fields = Form::where('form_id', $form_id)->get();
        $iteration = $request['_iteration'];
        $form_field_array = array();

        try {
            $base_form->form_id = $request['base_form_id'];
            $base_form->route = $request['route'];
            $base_form->method = $request['method'];
            $base_form->form_identifier = $request['form_identifier'];
            $base_form->form_enctype = $request['form_enctype'];
            $base_form->form_header_fr = $request['form_header_fr'];
            $base_form->form_header_en = $request['form_header_en'];
            $base_form->save();

            for ($i=1; $i<=$iteration; $i++) {
                if(isset($request['id_' . $i]) && (int)$request['id_' . $i] === $form_fields[$i-1]->id) {
                    $form_field = $form_fields[$i-1];
                } else {
                    $form_field = new Form();
                }
                if($request['form_id_' . $i] !== $base_form->form_id) {
                    throw new \Exception('not the same form id as the base form info one');
                }
                $form_field->form_id = (int)$request['form_id_' . $i];
                $form_field->input_id = $request['input_id_' . $i];
                $form_field->input_type = $request['input_type_' . $i];
                $form_field->input_name = $request['input_name_' . $i];
                $form_field->label_title = $request['label_title_' . $i];
                $form_field->primary_color = $request['primary_color_' . $i];
                $form_field_array[] = $form_field;
            }

            foreach ($form_field_array as $ff) {
                $ff->save();
            }

            // Redirect to the home page with success menu
            return Redirect::route('forms.index')->with('success', trans('forms/message.success.create'));
        } catch (\Exception $e) {
            $error = trans('forms/message.error.generic');
        }
        return Redirect::route('forms.edit', ['form' => $base_form->form_id])->with('error', $error);
    }

    public function show() {
        return view('forms.show-form');
    }

    /**
     * Delete Confirm
     *
     * @param   int $id
     * @return  View
     */
    public function getModalDelete($id)
    {

    }

}
