<?php

namespace App\Controllers\Admin;

use App\Models\CategoryModel;
use App\Models\EnquiryModel;
use App\Models\GalleryItemModel;
use App\Models\HeroSlideModel;
use App\Models\OfferModel;
use App\Models\OrderModel;
use App\Models\ProductModel;
use App\Models\ReservationModel;
use App\Models\TestimonialModel;

class DashboardController extends BaseAdminController
{
    public function index(): string
    {
        $productModel = new ProductModel();
        $orderModel = new OrderModel();
        $reservationModel = new ReservationModel();
        $enquiryModel = new EnquiryModel();

        return $this->render('dashboard', [
            'title' => 'Admin Dashboard',
            'stats' => [
                ['label' => 'Products', 'value' => $productModel->countAll(), 'icon' => 'bi bi-cup-hot'],
                ['label' => 'Takeaway Orders', 'value' => $orderModel->countAll(), 'icon' => 'bi bi-bag-check'],
                ['label' => 'Reservations', 'value' => $reservationModel->countAll(), 'icon' => 'bi bi-calendar2-check'],
                ['label' => 'Enquiries', 'value' => $enquiryModel->countAll(), 'icon' => 'bi bi-chat-left-text'],
                ['label' => 'Categories', 'value' => (new CategoryModel())->countAll(), 'icon' => 'bi bi-grid'],
                ['label' => 'Gallery Items', 'value' => (new GalleryItemModel())->countAll(), 'icon' => 'bi bi-images'],
                ['label' => 'Hero Slides', 'value' => (new HeroSlideModel())->countAll(), 'icon' => 'bi bi-layout-text-window'],
                ['label' => 'Offers', 'value' => (new OfferModel())->countAll(), 'icon' => 'bi bi-stars'],
            ],
            'recentOrders' => $orderModel->orderBy('id', 'DESC')->findAll(5),
            'recentReservations' => $reservationModel->orderBy('id', 'DESC')->findAll(5),
            'recentEnquiries' => $enquiryModel->orderBy('id', 'DESC')->findAll(5),
            'recentProducts' => $productModel->select('products.*, categories.name as category_name')
                ->join('categories', 'categories.id = products.category_id', 'left')
                ->orderBy('products.id', 'DESC')
                ->findAll(5),
            'testimonialCount' => (new TestimonialModel())->countAll(),
        ]);
    }
}
