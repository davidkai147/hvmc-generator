<?php

namespace DummyNamespace\Http\Controllers;

use Core\Base\Http\Controllers\BaseController;

class DummyNameController extends BaseController
{
    protected $moduleName = 'DummyName';
    protected $moduleLowerCase = 'DummyAlias';
    protected $DummyAliasService;

    /**
     * DummyNameController constructor.
     * @param DummyNameService $categoryService
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
        return view($this->moduleLowerCase . '::index');
    }

    /**
     * Show form
     * @return Application|Factory|View
     */
    public function form()
    {
        return view($this->moduleLowerCase . '::form');
    }

    /**
     * Show detail
     * @param $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        return view($this->moduleLowerCase . '::edit');
    }

    /**
     * Create a new category
     * @param CreateDummyNameRequest $request
     * @return RedirectResponse
     */
    public function store(CreateDummyNameRequest $request): RedirectResponse
    {

    }

    /**
     * Update a category
     * @param UpdateDummyNameRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(UpdateDummyNameRequest $request, $id): RedirectResponse
    {

    }
}
