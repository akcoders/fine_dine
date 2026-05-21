<?php

namespace App\Controllers\Admin;

use App\Models\GalleryItemModel;

class GalleryController extends BaseAdminController
{
    public function index(): string
    {
        return $this->render('gallery/index', [
            'title' => 'Gallery',
            'items' => (new GalleryItemModel())->orderBy('sort_order', 'ASC')->findAll(),
        ]);
    }

    public function create(): string
    {
        return $this->render('gallery/form', [
            'title' => 'Add Gallery Item',
            'item' => null,
        ]);
    }

    public function store()
    {
        $image = $this->uploadImage('image_file', 'gallery', $this->cleanPath($this->request->getPost('image')));

        (new GalleryItemModel())->insert([
            'title'      => $this->request->getPost('title'),
            'image'      => $image,
            'sort_order' => (int) $this->request->getPost('sort_order'),
            'is_active'  => $this->isChecked('is_active'),
        ]);

        return redirect()->to(site_url('admin/gallery'))->with('success', 'Gallery item created.');
    }

    public function edit(int $id): string
    {
        return $this->render('gallery/form', [
            'title' => 'Edit Gallery Item',
            'item' => (new GalleryItemModel())->find($id),
        ]);
    }

    public function update(int $id)
    {
        $model = new GalleryItemModel();
        $item = $model->find($id);
        $image = $this->uploadImage('image_file', 'gallery', $this->cleanPath($this->request->getPost('image')) ?: ($item['image'] ?? null));

        $model->update($id, [
            'title'      => $this->request->getPost('title'),
            'image'      => $image,
            'sort_order' => (int) $this->request->getPost('sort_order'),
            'is_active'  => $this->isChecked('is_active'),
        ]);

        return redirect()->to(site_url('admin/gallery'))->with('success', 'Gallery item updated.');
    }

    public function delete(int $id)
    {
        (new GalleryItemModel())->delete($id);

        return redirect()->to(site_url('admin/gallery'))->with('success', 'Gallery item deleted.');
    }
}
