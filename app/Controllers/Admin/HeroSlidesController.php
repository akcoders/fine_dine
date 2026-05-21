<?php

namespace App\Controllers\Admin;

use App\Models\HeroSlideModel;

class HeroSlidesController extends BaseAdminController
{
    public function index(): string
    {
        return $this->render('hero_slides/index', [
            'title' => 'Hero Slides',
            'slides' => (new HeroSlideModel())->orderBy('sort_order', 'ASC')->findAll(),
        ]);
    }

    public function create(): string
    {
        return $this->render('hero_slides/form', [
            'title' => 'Add Hero Slide',
            'slide' => null,
        ]);
    }

    public function store()
    {
        $image = $this->uploadImage('image_file', 'hero', $this->cleanPath($this->request->getPost('image')));

        (new HeroSlideModel())->insert([
            'eyebrow'      => $this->request->getPost('eyebrow'),
            'title'        => $this->request->getPost('title'),
            'text'         => $this->request->getPost('text'),
            'image'        => $image,
            'button_label' => $this->request->getPost('button_label'),
            'button_link'  => $this->request->getPost('button_link'),
            'sort_order'   => (int) $this->request->getPost('sort_order'),
            'is_active'    => $this->isChecked('is_active'),
        ]);

        return redirect()->to(site_url('admin/hero-slides'))->with('success', 'Hero slide created.');
    }

    public function edit(int $id): string
    {
        return $this->render('hero_slides/form', [
            'title' => 'Edit Hero Slide',
            'slide' => (new HeroSlideModel())->find($id),
        ]);
    }

    public function update(int $id)
    {
        $model = new HeroSlideModel();
        $slide = $model->find($id);
        $image = $this->uploadImage('image_file', 'hero', $this->cleanPath($this->request->getPost('image')) ?: ($slide['image'] ?? null));

        $model->update($id, [
            'eyebrow'      => $this->request->getPost('eyebrow'),
            'title'        => $this->request->getPost('title'),
            'text'         => $this->request->getPost('text'),
            'image'        => $image,
            'button_label' => $this->request->getPost('button_label'),
            'button_link'  => $this->request->getPost('button_link'),
            'sort_order'   => (int) $this->request->getPost('sort_order'),
            'is_active'    => $this->isChecked('is_active'),
        ]);

        return redirect()->to(site_url('admin/hero-slides'))->with('success', 'Hero slide updated.');
    }

    public function delete(int $id)
    {
        (new HeroSlideModel())->delete($id);

        return redirect()->to(site_url('admin/hero-slides'))->with('success', 'Hero slide deleted.');
    }
}
