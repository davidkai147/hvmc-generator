<?php

namespace DummyNamespace\Repositories;

use DummyNamespace\Models\DummyName;
use Core\Base\Repositories\BaseRepository;

class DummyNameRepository extends BaseRepository implements DummyNameRepositoryInterface
{
    public function getModel()
    {
        return DummyName::class;
    }
}
