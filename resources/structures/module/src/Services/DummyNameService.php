<?php
namespace DummyNamespace\Services;

use Plugins\Categories\Repositories\DummyNameRepository;

class DummyNameService
{
    protected $DummyAliasRepository;

    public function __construct(DummyNameRepository $DummyAliasRepository)
    {
        $this->DummyAliasRepository = $DummyAliasRepository;
    }


}
