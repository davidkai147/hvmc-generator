<?php
namespace DummyNamespace\Services;

use Illuminate\Support\Facades\DB;
use Plugins\DummyName\Http\Requests\CreateDummyNameRequest;
use Plugins\DummyName\Http\Requests\UpdateDummyNameRequest;
use Plugins\DummyName\Repositories\DummyNameRepository;

class DummyNameService
{
    protected $DummyAliasRepository;

    public function __construct(DummyNameRepository $DummyAliasRepository)
    {
        $this->DummyAliasRepository = $DummyAliasRepository;
    }

    public function paginate($request)
    {
        $params = [
            'condition' => [

            ],
            'order_by'  => [

            ],
            'paginate'  => [
                'per_page'      => (empty($request['per_page'])) ? 10 : $request['per_page'],
                'current_paged' => (empty($request['page'])) ? 1 : $request['page'],
            ],
            'with'      => ['children'],
        ];
        return $this->DummyAliasRepository->advancedGet($params);
    }

    public function create(CreateDummyNameRequest $request)
    {
        $result = null;
        try {
            DB::beginTransaction();
            $result = $this->DummyAliasRepository->create($request->all());
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            dd($exception->getMessage());
        } finally {
            return $result;
        }
    }

    public function getDetail($id)
    {
        return $this->DummyAliasRepository->findOrFail($id);
    }

    public function update(UpdateDummyNameRequest $request, $id)
    {
        $conditions = [
            ['id', '=', $id]
        ];

        $result = null;
        try {
            DB::beginTransaction();
            $result = $this->DummyAliasRepository->update($conditions, $request->all());
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
        } finally {
            return $result;
        }
    }

    public function delete($model)
    {
        $result = null;
        try {
            DB::beginTransaction();
            $result = $this->DummyAliasRepository->delete($model);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
        } finally {
            return $result;
        }
    }
}
