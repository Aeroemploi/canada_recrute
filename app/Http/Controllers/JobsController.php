<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class JobsController extends JoshController
{
    public function index() {
        // Show the page
        return view('jobs.index', compact('jobs'));
    }

    public function data() {
        $jobs = Job::get(['id', 'order_id', 'job_title_fr', 'job_title_en', 'link', 'location', 'job_type', 'is_active']);

        return DataTables::of($jobs)
            ->addColumn('actions',function($job) {
                $actions = '<a href='. route('jobs.assign', $job->id) .'><i class="livicon" data-name="check" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="Select this Job"></i></a>
                            <a href='. route('jobs.edit', $job->id) .'><i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="update job"></i></a>';
                $actions .= '<a href='. route('jobs.confirm-delete', $job->id) .' data-id="'.$job->id.'" data-toggle="modal" data-target="#delete_confirm"><i class="livicon" data-name="job-remove" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete job"></i></a>';
                return $actions;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function create() {
        $job = new Job();
        // Show the page
        return view('jobs.create', [
            'job' => $job
            ]);
    }

    public function store(Request $request) {
        try {
            // Register the user
            $job = new Job();

            $job->order_id = $request['order_id'];
            $job->job_title_fr = $request['job_title_fr'];
            $job->job_title_en = $request['job_title_en'];
            $job->link = $request['link'];
            $job->location = $request['location'];
            $job->job_type = Job::JOBS_TYPES[$request['job_type']];
            $job->is_active = $request['is_active'];

            $job->save();

            // Redirect to the home page with success menu
            return \Redirect::route('jobs.index')->with('success', 'La job à été créer avec succès');
        } catch (\Exception $e) {
            $error = $e->getMessage();
        }

        // Redirect to the user creation page
        return \Redirect::back()->withInput()->with('error', $error);
    }

    public function edit($id) {
        $job = Job::find($id);
        // Show the page
        return view('jobs.edit', compact('job'));
    }

    public function updating($id) {
        try {
            $job = Job::find($id);
            $job->update(request()->all());

            // Was the user updated?
            if ($job->save()) {
                // Prepare the success message
                $success = 'La job à été updaté avec succès';

                // Redirect to the user page
                return \Redirect::route('jobs.edit', $job)->with('success', $success);
            }

            // Prepare the error message
            $error = 'Il y à eu une erreur en modifiant la job';
        } catch (\Exception $e) {
            // Prepare the error message
            $error = $e->getMessage();

            // Redirect to the user management page
            return \Redirect::route('jobs.index')->with('error', $error);
        }

        // Redirect to the user page
        return \Redirect::route('jobs.edit', $job)->withInput()->with('error', $error);
    }

    public function update() {

    }

    public function assign() {
        // Show the page
        return view('jobs.index', compact('jobs'));
    }

    /**
     * Delete Confirm
     *
     * @param   int $id
     * @return  View
     */
    public function getModalDelete($id)
    {
        $model = 'jobs';
        $confirm_route = $error = null;
        try {
            // Get user information
            $job = Job::find($id);

            return view('layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
        } catch (\Exception $e) {
            // Prepare the error message
            $error = trans($e->getMessage(), compact('id'));
            return view('layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
        }
    }

    public function destroy($id)
    {
        try {
            // Get user information
            $job = Job::find($id);

            // Delete the template
            //to allow soft deleted, we are performing query on templates model instead of Sentinel model
            Job::destroy($id);
            // Prepare the success message
            $success = trans('La Job à été supprimer avec succès!');

            // Redirect to the user management page
            return \Redirect::route('jobs.index')->with('success', $success);
        } catch (\Exception $e) {
            // Prepare the error message
            $error = trans($e->getMessage(), compact('id'));

            // Redirect to the user management page
            return \Redirect::route('jobs.index')->with('error', $error);
        }
    }
}
