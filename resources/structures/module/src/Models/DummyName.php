<?php

namespace DummyNamespace\Models;

use Core\Base\Helpers\BaseHelper;
use Core\Base\Traits\HasLanguageMeta;
use Core\Base\Traits\HasModify;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Core\Base\Models\BaseModel;

class DummyName extends BaseModel
{
    use HasFactory, HasModify, HasLanguageMeta;

    protected $table = 'DummyAlias';

    protected $fillable = [

    ];

    protected static function newFactory()
    {
        return \DummyNamespace\Database\factories\DummyNameFactory::new();
    }
}
