<?php

namespace App\Transformers;

use Illuminate\Database\Eloquent\Model;
use League\Fractal\Manager;
use League\Fractal\ScopeFactoryInterface;
use Illuminate\Support\Collection;
use League\Fractal\Serializer\SerializerAbstract;
use League\Fractal\TransformerAbstract;
use League\Fractal;

class APIFractalManager extends Manager
{

    /**
     * @param SerializerAbstract $serializer
     * @return Manager
     */
    public function setSerializer(SerializerAbstract $serializer)
    {
        return parent::setSerializer(new APISerializer());
    }

    /**
     * @param Model $model
     * @param TransformerAbstract $transformerAbstract
     * @return array
     */
    public function item(Model $model, TransformerAbstract $transformerAbstract)
    {
        $item = new Fractal\Resource\Item($model, $transformerAbstract);
        $item = $this->createData($item);
        return $item->toArray();
    }

    /**
     * @param $collection
     * @param TransformerAbstract $transformerAbstract
     * @return array
     */
    public function collection(Collection $collection, TransformerAbstract $transformerAbstract)
    {
        $collection = new Fractal\Resource\Collection($collection, $transformerAbstract);
        $collection = $this->createData($collection);
        return $collection->toArray();
    }
}
