<?php

namespace App\Controllers\Admin;

use App\Models\TestimonialModel;

class TestimonialsController extends BaseAdminController
{
    public function index(): string
    {
        return $this->render('testimonials/index', [
            'title' => 'Testimonials',
            'testimonials' => (new TestimonialModel())->orderBy('sort_order', 'ASC')->findAll(),
        ]);
    }

    public function create(): string
    {
        return $this->render('testimonials/form', [
            'title' => 'Add Testimonial',
            'testimonial' => null,
        ]);
    }

    public function store()
    {
        $image = $this->uploadImage('image_file', 'testimonials', $this->cleanPath($this->request->getPost('image')));

        (new TestimonialModel())->insert([
            'author'     => $this->request->getPost('author'),
            'quote'      => $this->request->getPost('quote'),
            'image'      => $image,
            'sort_order' => (int) $this->request->getPost('sort_order'),
            'is_active'  => $this->isChecked('is_active'),
        ]);

        return redirect()->to(site_url('admin/testimonials'))->with('success', 'Testimonial created.');
    }

    public function edit(int $id): string
    {
        return $this->render('testimonials/form', [
            'title' => 'Edit Testimonial',
            'testimonial' => (new TestimonialModel())->find($id),
        ]);
    }

    public function update(int $id)
    {
        $model = new TestimonialModel();
        $testimonial = $model->find($id);
        $image = $this->uploadImage('image_file', 'testimonials', $this->cleanPath($this->request->getPost('image')) ?: ($testimonial['image'] ?? null));

        $model->update($id, [
            'author'     => $this->request->getPost('author'),
            'quote'      => $this->request->getPost('quote'),
            'image'      => $image,
            'sort_order' => (int) $this->request->getPost('sort_order'),
            'is_active'  => $this->isChecked('is_active'),
        ]);

        return redirect()->to(site_url('admin/testimonials'))->with('success', 'Testimonial updated.');
    }

    public function delete(int $id)
    {
        (new TestimonialModel())->delete($id);

        return redirect()->to(site_url('admin/testimonials'))->with('success', 'Testimonial deleted.');
    }
}
