<?php

namespace DummyNamespace\Http\Controllers;

use Core\Base\Http\Controllers\BaseController;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use DummyNamespace\Http\Requests\CreateDummyNameRequest;
use DummyNamespace\Http\Requests\UpdateDummyNameRequest;
use DummyNamespace\Models\DummyName;
use DummyNamespace\Services\DummyNameService;

class DummyNameController extends BaseController
{
    protected $moduleName = 'DummyName';
    protected $moduleLowerCase = 'DummyAlias';
    protected $DummyAliasService;

    /**
     * DummyNameController constructor.
     * @param DummyNameService $DummyAliasService
     */
    public function __construct(DummyNameService $DummyAliasService)
    {
        parent::__construct();
        $this->DummyAliasService = $DummyAliasService;
    }

    /**
     * Get list of categories
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        // Set title as view
        $this->module_title = trans($this->moduleLowerCase . '::module.list_title');
        $this->assignViewShare('module_title', $this->module_title);

        // Get data
        $list = $this->DummyAliasService->paginate($request->all());

        return view($this->moduleLowerCase . '::index', compact('list'));
    }

    /**
     * Show form
     * @return Application|Factory|View
     */
    public function form()
    {
        // Set title as view
        $this->module_title = trans($this->moduleLowerCase . '::module.create_title');
        $this->assignViewShare('module_title', $this->module_title);

        return view($this->moduleLowerCase . '::form');
    }

    /**
     * Show detail
     * @param $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        // Set title as view
        $this->module_title = trans($this->moduleLowerCase . '::module.update_title');
        $this->assignViewShare('module_title', $this->module_title);

        $data = $this->DummyAliasService->getDetail($id);

        return view($this->moduleLowerCase . '::edit', compact('data'));
    }

    /**
     * Create a new category
     * @param CreateDummyNameRequest $request
     * @return RedirectResponse
     */
    public function store(CreateDummyNameRequest $request): RedirectResponse
    {
        $result = $this->DummyAliasService->create($request);

        if (!empty($result)) {
            return redirect()->route(config($this->moduleLowerCase . '.route.admin.list'))
                ->with('success', trans($this->moduleLowerCase . '::module.create_success'));
        } else {
            return redirect()->back()->withInput()->with('error', 'Co loi xay ra');
        }
    }

    /**
     * Update a category
     * @param UpdateDummyNameRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(UpdateDummyNameRequest $request, $id): RedirectResponse
    {
        $result = $this->DummyAliasService->update($request, $id);

        if (!empty($result)) {
            return redirect()->route(config($this->moduleLowerCase . '.route.admin.list'))
                ->with('success', trans($this->moduleLowerCase . '::module.update_success'));
        } else {
            return redirect()->back()->withInput()->with('error', 'Co loi xay ra');
        }
    }

    public function delete(DummyName $DummyAlias)
    {
        if ($this->DummyAliasService->delete($DummyAlias)) {
            return redirect()->route(config('DummyAlias.route.admin.list'))->with('success', 'Delete thành công');
        }
    }
}
