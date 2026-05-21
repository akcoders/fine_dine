<?php

namespace App\Controllers\Admin;

use App\Models\OfferModel;

class OffersController extends BaseAdminController
{
    public function index(): string
    {
        return $this->render('offers/index', [
            'title' => 'Offers',
            'offers' => (new OfferModel())->orderBy('sort_order', 'ASC')->findAll(),
        ]);
    }

    public function create(): string
    {
        return $this->render('offers/form', [
            'title' => 'Add Offer',
            'offer' => null,
        ]);
    }

    public function store()
    {
        $image = $this->uploadImage('image_file', 'offers', $this->cleanPath($this->request->getPost('image')));

        (new OfferModel())->insert([
            'title'        => $this->request->getPost('title'),
            'subtitle'     => $this->request->getPost('subtitle'),
            'description'  => $this->request->getPost('description'),
            'image'        => $image,
            'button_label' => $this->request->getPost('button_label'),
            'button_link'  => $this->request->getPost('button_link'),
            'badge'        => $this->request->getPost('badge'),
            'price_label'  => $this->request->getPost('price_label'),
            'sort_order'   => (int) $this->request->getPost('sort_order'),
            'is_active'    => $this->isChecked('is_active'),
        ]);

        return redirect()->to(site_url('admin/offers'))->with('success', 'Offer created.');
    }

    public function edit(int $id): string
    {
        return $this->render('offers/form', [
            'title' => 'Edit Offer',
            'offer' => (new OfferModel())->find($id),
        ]);
    }

    public function update(int $id)
    {
        $model = new OfferModel();
        $offer = $model->find($id);
        $image = $this->uploadImage('image_file', 'offers', $this->cleanPath($this->request->getPost('image')) ?: ($offer['image'] ?? null));

        $model->update($id, [
            'title'        => $this->request->getPost('title'),
            'subtitle'     => $this->request->getPost('subtitle'),
            'description'  => $this->request->getPost('description'),
            'image'        => $image,
            'button_label' => $this->request->getPost('button_label'),
            'button_link'  => $this->request->getPost('button_link'),
            'badge'        => $this->request->getPost('badge'),
            'price_label'  => $this->request->getPost('price_label'),
            'sort_order'   => (int) $this->request->getPost('sort_order'),
            'is_active'    => $this->isChecked('is_active'),
        ]);

        return redirect()->to(site_url('admin/offers'))->with('success', 'Offer updated.');
    }

    public function delete(int $id)
    {
        (new OfferModel())->delete($id);

        return redirect()->to(site_url('admin/offers'))->with('success', 'Offer deleted.');
    }
}
