<?php

namespace App\Http\Controllers;

use App\Http\Services\ProjectService;
use App\Project;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class ProjectController extends Controller
{
    /**
     * @var ProjectService
     */
    protected $projectService;

    /**
     * Create a new controller instance.
     * @param ProjectService $projectService
     */
    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    /**
     * Show the site main page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('site.singleProject');
    }

    /**
     * @param Project $project
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getSingleProject(Project $project)
    {
        return view(
            'site.singleProject',
            [
                'project' => $project,
                'donations' => $project->donations()
            ]
        );
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAllProjects()
    {
        return view('admin.projects', ['projects' => Project::with('donations')->get()]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function addProject(Request $request)
    {
        if ($request->isMethod('post')) {
            $inputFields = $request->except('_token');
            $validation = $this->projectService->validateProjectInput($inputFields);

            if (!$validation['success']) {
                return redirect()
                    ->route('addProject')
                    ->withErrors($validation['validator'])
                    ->withInput();
            }

            if ($request->hasfile('thumbnail')) {
                try {
                    $inputFields['thumbnail'] = '/uploads/' . $this->saveFile($request->file('thumbnail'));
                } catch (FileException $exception) {
                    $inputFields['thumbnail'] = null;
                }
            }

            if ($this->projectService->persistProject(new Project(), $inputFields)) {
                return redirect('admin/project')->with('status', 'Проект додано!');
            }
        }

        return view('admin.addProject', ['title' => 'Добавити новий проект']);
    }

    /**
     * @param Project $project
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function editProject(Project $project, Request $request)
    {
        if ($request->isMethod('post')) {
            $inputFields = $request->except('_token');

            $validation = $this->projectService->validateProjectInput($inputFields);
            if (!$validation['success']) {
                return redirect()
                    ->route('editProject')
                    ->withErrors($validation['validator'])
                    ->withInput();
            }

            if ($request->hasfile('thumbnail')) {
                try {
                    $inputFields['thumbnail'] = '/uploads/' . $this->saveFile($request->file('thumbnail'));
                } catch (FileException $exception) {
                    $inputFields['thumbnail'] = null;
                }
            }

            if ($this->projectService->persistProject($project, $inputFields)) {
                return redirect('admin/project')->with('status', 'Проект оновленно!');
            }
        }

        return view('admin.editProject', ['data' => $project->toArray(), 'title' => $project->title]);
    }

    /**
     * @param Project $project
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function deleteProject(Project $project, Request $request)
    {
        if ($request->isMethod('post')) {
            $project->delete();
            return redirect('admin/project')->with('status', 'Проект видалено');
        }
    }

    /**
     * @param \Illuminate\Http\UploadedFile $file
     * @return string
     */
    protected function saveFile(\Illuminate\Http\UploadedFile $file)
    {
        $extension = $file->getClientOriginalExtension(); // getting image extension
        $filename = time() . '.' . $extension;
        $file->move('uploads/', $filename);

        return $filename;
    }
}
