<?php

namespace App\Repositories;

use App\Interfaces\HomeRepositoryInterface;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Faq;
use App\Models\Product;
use App\Models\Service;
use App\Models\Software;

class HomeRepository implements HomeRepositoryInterface
{
    protected $modelName;

    public function __construct(Blog $modelName)
    {
        $this->modelName = $modelName;
    }

    public function index()
    {
        return Faq::all();
    }

    public function getById($id)
    {
        return $this->modelName->findOrFail($id);
    }

    public function store(array $data)
    {
        return $this->modelName->create($data);
    }

    public function update(array $data, $id)
    {
        return $this->modelName->whereId($id)->update($data);
    }

    public function delete($id)
    {
        return $this->modelName->destroy($id);
    }

    public function faqs()
    {
        return $this->modelName->all();
    }

    public function categories()
    {
        return Category::all();
    }

    public function products()
    {
        return Product::all();
    }

    public function services()
    {
        $data = Service::with('subServices')->get();
        return $data;
    }

    public function softwares()
    {
        $data = Software::with('subSoftwares')->get();
        return $data;
    }
}
