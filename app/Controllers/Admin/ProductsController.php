<?php

namespace App\Controllers\Admin;

use App\Models\CategoryModel;
use App\Models\ProductModel;

class ProductsController extends BaseAdminController
{
    public function index(): string
    {
        $products = (new ProductModel())
            ->select('products.*, categories.name as category_name')
            ->join('categories', 'categories.id = products.category_id', 'left')
            ->orderBy('products.sort_order', 'ASC')
            ->orderBy('products.id', 'ASC')
            ->findAll();

        return $this->render('products/index', [
            'title' => 'Products',
            'products' => $products,
        ]);
    }

    public function create(): string
    {
        return $this->render('products/form', [
            'title' => 'Add Product',
            'product' => null,
            'categories' => (new CategoryModel())->orderBy('sort_order', 'ASC')->findAll(),
        ]);
    }

    public function store()
    {
        $model = new ProductModel();
        $name = trim((string) $this->request->getPost('name'));
        $slug = trim((string) $this->request->getPost('slug')) ?: $this->slugify($name);
        $image = $this->uploadImage('image_file', 'products', $this->cleanPath($this->request->getPost('image')));

        $model->insert([
            'category_id'        => $this->request->getPost('category_id') ?: null,
            'name'               => $name,
            'slug'               => $slug,
            'subtitle'           => $this->request->getPost('subtitle'),
            'short_description'  => $this->request->getPost('short_description'),
            'description'        => $this->request->getPost('description'),
            'price'              => (float) $this->request->getPost('price'),
            'original_price'     => $this->request->getPost('original_price') !== '' ? (float) $this->request->getPost('original_price') : null,
            'badge'              => $this->request->getPost('badge'),
            'accent'             => $this->request->getPost('accent'),
            'rating'             => $this->request->getPost('rating'),
            'prep_time'          => $this->request->getPost('prep_time'),
            'serves'             => $this->request->getPost('serves'),
            'image'              => $image,
            'notes'              => $this->request->getPost('notes'),
            'is_featured'        => $this->isChecked('is_featured'),
            'is_active'          => $this->isChecked('is_active'),
            'sort_order'         => (int) $this->request->getPost('sort_order'),
        ]);

        return redirect()->to(site_url('admin/products'))->with('success', 'Product created.');
    }

    public function edit(int $id): string
    {
        return $this->render('products/form', [
            'title' => 'Edit Product',
            'product' => (new ProductModel())->find($id),
            'categories' => (new CategoryModel())->orderBy('sort_order', 'ASC')->findAll(),
        ]);
    }

    public function update(int $id)
    {
        $model = new ProductModel();
        $product = $model->find($id);
        $name = trim((string) $this->request->getPost('name'));
        $slug = trim((string) $this->request->getPost('slug')) ?: $this->slugify($name);
        $image = $this->uploadImage('image_file', 'products', $this->cleanPath($this->request->getPost('image')) ?: ($product['image'] ?? null));

        $model->update($id, [
            'category_id'        => $this->request->getPost('category_id') ?: null,
            'name'               => $name,
            'slug'               => $slug,
            'subtitle'           => $this->request->getPost('subtitle'),
            'short_description'  => $this->request->getPost('short_description'),
            'description'        => $this->request->getPost('description'),
            'price'              => (float) $this->request->getPost('price'),
            'original_price'     => $this->request->getPost('original_price') !== '' ? (float) $this->request->getPost('original_price') : null,
            'badge'              => $this->request->getPost('badge'),
            'accent'             => $this->request->getPost('accent'),
            'rating'             => $this->request->getPost('rating'),
            'prep_time'          => $this->request->getPost('prep_time'),
            'serves'             => $this->request->getPost('serves'),
            'image'              => $image,
            'notes'              => $this->request->getPost('notes'),
            'is_featured'        => $this->isChecked('is_featured'),
            'is_active'          => $this->isChecked('is_active'),
            'sort_order'         => (int) $this->request->getPost('sort_order'),
        ]);

        return redirect()->to(site_url('admin/products'))->with('success', 'Product updated.');
    }

    public function delete(int $id)
    {
        (new ProductModel())->delete($id);

        return redirect()->to(site_url('admin/products'))->with('success', 'Product deleted.');
    }
}
