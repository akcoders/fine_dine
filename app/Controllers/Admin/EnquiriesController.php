<?php

namespace App\Controllers\Admin;

use App\Models\EnquiryModel;

class EnquiriesController extends BaseAdminController
{
    public function index(): string
    {
        return $this->render('enquiries/index', [
            'title' => 'Enquiries',
            'enquiries' => (new EnquiryModel())->orderBy('id', 'DESC')->findAll(),
        ]);
    }

    public function show(int $id): string
    {
        return $this->render('enquiries/show', [
            'title' => 'Enquiry Details',
            'enquiry' => (new EnquiryModel())->find($id),
        ]);
    }

    public function updateStatus(int $id)
    {
        (new EnquiryModel())->update($id, [
            'status' => $this->request->getPost('status') ?: 'new',
        ]);

        return redirect()->to(site_url('admin/enquiries'))->with('success', 'Enquiry updated.');
    }
}
