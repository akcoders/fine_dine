<?php

namespace App\Controllers\Admin;

use App\Models\CategoryModel;

class CategoriesController extends BaseAdminController
{
    public function index(): string
    {
        return $this->render('categories/index', [
            'title' => 'Categories',
            'categories' => (new CategoryModel())->orderBy('sort_order', 'ASC')->orderBy('id', 'ASC')->findAll(),
        ]);
    }

    public function create(): string
    {
        return $this->render('categories/form', [
            'title' => 'Add Category',
            'category' => null,
        ]);
    }

    public function store()
    {
        $model = new CategoryModel();
        $name = trim((string) $this->request->getPost('name'));
        $slug = trim((string) $this->request->getPost('slug')) ?: $this->slugify($name);
        $image = $this->uploadImage('image_file', 'categories', $this->cleanPath($this->request->getPost('image')));

        $model->insert([
            'name'        => $name,
            'slug'        => $slug,
            'subtitle'    => $this->request->getPost('subtitle'),
            'description' => $this->request->getPost('description'),
            'image'       => $image,
            'sort_order'  => (int) $this->request->getPost('sort_order'),
            'is_active'   => $this->isChecked('is_active'),
        ]);

        return redirect()->to(site_url('admin/categories'))->with('success', 'Category created.');
    }

    public function edit(int $id): string
    {
        return $this->render('categories/form', [
            'title' => 'Edit Category',
            'category' => (new CategoryModel())->find($id),
        ]);
    }

    public function update(int $id)
    {
        $model = new CategoryModel();
        $category = $model->find($id);
        $name = trim((string) $this->request->getPost('name'));
        $slug = trim((string) $this->request->getPost('slug')) ?: $this->slugify($name);
        $image = $this->uploadImage('image_file', 'categories', $this->cleanPath($this->request->getPost('image')) ?: ($category['image'] ?? null));

        $model->update($id, [
            'name'        => $name,
            'slug'        => $slug,
            'subtitle'    => $this->request->getPost('subtitle'),
            'description' => $this->request->getPost('description'),
            'image'       => $image,
            'sort_order'  => (int) $this->request->getPost('sort_order'),
            'is_active'   => $this->isChecked('is_active'),
        ]);

        return redirect()->to(site_url('admin/categories'))->with('success', 'Category updated.');
    }

    public function delete(int $id)
    {
        (new CategoryModel())->delete($id);

        return redirect()->to(site_url('admin/categories'))->with('success', 'Category deleted.');
    }
}
