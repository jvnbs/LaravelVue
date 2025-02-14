<?php

namespace App\Repositories;

use App\Models\Product;
use App\Interfaces\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        return $this->product->all();
    }

    public function getById($id)
    {
        return $this->product->findOrFail($id);
    }

    public function store(array $data)
    {
        return $this->product->create($data);
    }

    public function update(array $data, $id)
    {
        return $this->product->whereId($id)->update($data);
    }

    public function delete($id)
    {
        return $this->product->destroy($id);
    }
}
