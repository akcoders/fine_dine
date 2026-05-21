<?php

namespace App\Controllers;

use App\Libraries\SiteDefaults;
use App\Libraries\StripeCheckoutService;
use App\Models\CategoryModel;
use App\Models\EnquiryModel;
use App\Models\GalleryItemModel;
use App\Models\HeroSlideModel;
use App\Models\OfferModel;
use App\Models\OrderModel;
use App\Models\ProductModel;
use App\Models\ReservationModel;
use App\Models\SettingModel;
use App\Models\TestimonialModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Home extends BaseController
{
    private SettingModel $settingModel;
    private CategoryModel $categoryModel;
    private ProductModel $productModel;
    private HeroSlideModel $heroSlideModel;
    private OfferModel $offerModel;
    private GalleryItemModel $galleryItemModel;
    private TestimonialModel $testimonialModel;
    private ReservationModel $reservationModel;
    private EnquiryModel $enquiryModel;
    private OrderModel $orderModel;
    private StripeCheckoutService $stripeCheckoutService;
    private array $settings = [];

    public function __construct()
    {
        $this->settingModel = new SettingModel();
        $this->categoryModel = new CategoryModel();
        $this->productModel = new ProductModel();
        $this->heroSlideModel = new HeroSlideModel();
        $this->offerModel = new OfferModel();
        $this->galleryItemModel = new GalleryItemModel();
        $this->testimonialModel = new TestimonialModel();
        $this->reservationModel = new ReservationModel();
        $this->enquiryModel = new EnquiryModel();
        $this->orderModel = new OrderModel();
        $this->stripeCheckoutService = new StripeCheckoutService();
    }

    public function index(): string
    {
        $products = $this->catalog();
        $featuredProducts = array_values(array_filter($products, static fn (array $product): bool => (bool) $product['is_featured']));
        $featuredProducts = array_slice($featuredProducts ?: $products, 0, 4);
        $specialDish = $this->findProduct($this->setting('special_dish_slug', '')) ?? ($featuredProducts[0] ?? $products[0] ?? null);

        return view('store/home', array_merge($this->brandData(), [
            'title'            => 'La Majestic | French Cuisine, Bar & Modern European Dining',
            'metaDescription'  => 'La Majestic in Windsor, Melbourne serves French cuisine, modern European dishes, cocktails, seafood, desserts, and elegant private dining.',
            'page'             => 'home',
            'products'         => $products,
            'featuredProducts' => $featuredProducts,
            'heroProduct'      => $featuredProducts[0] ?? null,
            'heroSlides'       => $this->heroSlides(),
            'collections'      => $this->offers(),
            'menuSections'     => $this->menuSections(),
            'specialties'      => $featuredProducts,
            'specialDish'      => $specialDish,
            'chef'             => [
                'name'  => 'Sensory Indulgence',
                'title' => 'A Feast for the Senses',
                'bio'   => 'Dining at La Majestic is not just about taste - it is about engaging all your senses.',
                'image' => $this->assetUrl('assets/img/european-cuisine.jpg'),
                'quote' => 'We strive to create dishes that are as pleasing to the eye as they are to the palate.',
            ],
            'testimonials'     => $this->testimonials(),
            'galleryImages'    => $this->galleryImages(),
            'reservationSlots' => $this->reservationSlots(),
            'serviceModes'     => $this->serviceModes(),
            'strengths'        => $this->strengths(),
        ]));
    }

    public function menu(): string
    {
        $products = $this->catalog();

        return view('store/menu', array_merge($this->brandData(), [
            'title'           => 'Our Menu | La Majestic',
            'metaDescription' => 'Explore La Majestic menu with entrees, mains, seafood, salads, sides, and desserts in Windsor, Melbourne.',
            'page'            => 'menu',
            'products'        => $products,
            'menuSections'    => $this->menuSections(),
            'menuIntro'       => $this->setting('menu_page_intro'),
        ]));
    }

    public function gallery(): string
    {
        return view('store/gallery', array_merge($this->brandData(), [
            'title'           => 'Gallery | La Majestic',
            'metaDescription' => 'Explore the atmosphere, plates, cocktails, and fine dining moments at La Majestic.',
            'page'            => 'gallery',
            'galleryImages'   => $this->galleryImages(),
            'galleryIntro'    => $this->setting('gallery_page_intro'),
        ]));
    }

    public function bookTable(): string
    {
        return view('store/book_table', array_merge($this->brandData(), [
            'title'            => 'Book A Table | La Majestic',
            'metaDescription'  => 'Reserve your table at La Majestic for elegant dining, celebrations, and private evenings.',
            'page'             => 'book',
            'reservationSlots' => $this->reservationSlots(),
            'serviceModes'     => $this->serviceModes(),
            'bookingIntro'     => $this->setting('booking_page_intro'),
        ]));
    }

    public function cart(): string
    {
        return view('store/cart', array_merge($this->brandData(), [
            'title'            => 'Your Cart | La Majestic',
            'metaDescription'  => 'Review your selected La Majestic dishes and complete your takeaway checkout.',
            'page'             => 'cart',
            'featuredProducts' => array_slice($this->catalog(), 0, 4),
            'cartSummaryText'  => $this->setting('cart_summary_text'),
            'onlinePaymentEnabled' => $this->stripeEnabled(),
            'stripeCurrency'   => strtoupper($this->setting('stripe_currency', 'aud')),
        ]));
    }

    public function product(string $slug): string
    {
        $product = $this->findProduct($slug);

        if ($product === null) {
            throw PageNotFoundException::forPageNotFound("Product '{$slug}' was not found.");
        }

        $relatedProducts = array_values(array_filter(
            $this->catalog(),
            static fn (array $item): bool => $item['slug'] !== $slug
        ));

        return view('store/product', array_merge($this->brandData(), [
            'title'           => $product['name'] . ' | La Majestic',
            'metaDescription' => $product['description'],
            'page'            => 'menu',
            'product'         => $product,
            'relatedProducts' => array_slice($relatedProducts, 0, 4),
        ]));
    }

    public function submitReservation()
    {
        $date = $this->normalizeDate((string) $this->request->getPost('reservation_date'));

        $this->reservationModel->insert([
            'name'             => trim((string) $this->request->getPost('name')),
            'phone'            => trim((string) $this->request->getPost('phone')),
            'email'            => trim((string) $this->request->getPost('email')),
            'guests'           => trim((string) $this->request->getPost('guests')),
            'reservation_date' => $date ?: date('Y-m-d'),
            'reservation_time' => trim((string) $this->request->getPost('reservation_time')),
            'occasion'         => trim((string) $this->request->getPost('occasion')),
            'notes'            => trim((string) $this->request->getPost('notes')),
            'status'           => 'new',
        ]);

        return redirect()->back()->with('success', 'Your reservation request has been sent.');
    }

    public function submitEnquiry()
    {
        $this->enquiryModel->insert([
            'name'    => trim((string) $this->request->getPost('name')),
            'phone'   => trim((string) $this->request->getPost('phone')),
            'email'   => trim((string) $this->request->getPost('email')),
            'subject' => trim((string) $this->request->getPost('subject')),
            'message' => trim((string) $this->request->getPost('message')),
            'status'  => 'new',
        ]);

        return redirect()->back()->with('success', 'Your enquiry has been sent.');
    }

    public function submitOrder()
    {
        $items = json_decode((string) $this->request->getPost('items_json'), true);
        $paymentMethod = trim((string) $this->request->getPost('payment_method')) ?: 'cash';
        $name = trim((string) $this->request->getPost('customer_name'));
        $phone = trim((string) $this->request->getPost('phone'));
        $email = trim((string) $this->request->getPost('email'));

        if (! is_array($items) || $items === []) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        if ($name === '' || $phone === '' || $email === '') {
            return redirect()->back()->with('error', 'Name, mobile number, and email are required.');
        }

        if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return redirect()->back()->with('error', 'Please enter a valid email address.');
        }

        if (! in_array($paymentMethod, ['cash', 'online'], true)) {
            return redirect()->back()->with('error', 'Please choose a valid payment method.');
        }

        if ($paymentMethod === 'online' && ! $this->stripeEnabled()) {
            return redirect()->back()->with('error', 'Online payment is currently unavailable.');
        }

        $resolvedItems = $this->resolveCheckoutItems($items);

        if ($resolvedItems === []) {
            return redirect()->back()->with('error', 'We could not validate the dishes in your cart. Please add them again and continue.');
        }

        $subtotal = $this->calculateSubtotal($resolvedItems);
        $currency = strtolower($this->setting('stripe_currency', 'aud'));
        $orderId = $this->createOrder([
            'customer_name'   => $name,
            'phone'           => $phone,
            'email'           => $email,
            'order_mode'      => 'takeaway',
            'payment_method'  => $paymentMethod,
            'payment_status'  => $paymentMethod === 'cash' ? 'pending_cash' : 'pending',
            'order_notes'     => trim((string) $this->request->getPost('order_notes')),
            'subtotal'        => $subtotal,
            'currency'        => $currency,
            'items_json'      => json_encode($resolvedItems, JSON_UNESCAPED_SLASHES),
            'status'          => $paymentMethod === 'cash' ? 'placed' : 'pending_payment',
        ]);

        $order = $this->orderModel->find($orderId);

        if ($paymentMethod === 'cash') {
            return redirect()->to(site_url('checkout/thank-you/' . $order['order_reference']))->with('clearCart', '1');
        }

        try {
            $session = $this->stripeCheckoutService->createCheckoutSession(
                $this->setting('stripe_secret_key'),
                $this->buildStripeCheckoutPayload($order, $resolvedItems, $currency)
            );
        } catch (\Throwable $exception) {
            $this->orderModel->update($orderId, [
                'status' => 'payment_error',
                'payment_status' => 'failed',
            ]);

            return redirect()->back()->with('error', $exception->getMessage());
        }

        $this->orderModel->update($orderId, [
            'stripe_session_id' => $session['id'] ?? null,
        ]);

        return redirect()->to($session['url'] ?? site_url('cart'));
    }

    public function checkoutSuccess()
    {
        $sessionId = trim((string) $this->request->getGet('session_id'));

        if ($sessionId === '' || ! $this->stripeEnabled()) {
            return redirect()->to(site_url('cart'))->with('error', 'We could not verify your payment session.');
        }

        try {
            $session = $this->stripeCheckoutService->retrieveCheckoutSession($this->setting('stripe_secret_key'), $sessionId);
        } catch (\Throwable $exception) {
            return redirect()->to(site_url('cart'))->with('error', $exception->getMessage());
        }

        $order = $this->orderModel->where('stripe_session_id', $sessionId)->first();

        if (! $order) {
            return redirect()->to(site_url('cart'))->with('error', 'Order record not found for this payment.');
        }

        if (($session['payment_status'] ?? '') !== 'paid') {
            $this->orderModel->update($order['id'], [
                'status' => 'pending_payment',
            ]);

            return redirect()->to(site_url('checkout/cancel?order=' . rawurlencode($order['order_reference'])));
        }

        $this->orderModel->update($order['id'], [
            'payment_status'           => 'paid',
            'status'                   => 'paid',
            'stripe_payment_intent_id' => $session['payment_intent'] ?? null,
            'paid_at'                  => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(site_url('checkout/thank-you/' . $order['order_reference']))->with('clearCart', '1');
    }

    public function checkoutCancel(): string
    {
        $reference = trim((string) $this->request->getGet('order'));
        $order = $reference !== '' ? $this->orderModel->where('order_reference', $reference)->first() : null;

        if ($order) {
            $this->orderModel->update($order['id'], [
                'status' => 'payment_cancelled',
                'payment_status' => 'cancelled',
            ]);
        }

        return view('store/checkout_cancel', array_merge($this->brandData(), [
            'title'           => 'Payment Cancelled | La Majestic',
            'metaDescription' => 'Your online payment was cancelled.',
            'page'            => 'cart',
            'order'           => $order,
        ]));
    }

    public function orderThankYou(string $reference): string
    {
        $order = $this->orderModel->where('order_reference', $reference)->first();

        if (! $order) {
            throw PageNotFoundException::forPageNotFound('Order not found.');
        }

        return view('store/checkout_success', array_merge($this->brandData(), [
            'title'           => 'Order Confirmed | La Majestic',
            'metaDescription' => 'Your takeaway order has been placed successfully.',
            'page'            => 'cart',
            'order'           => $order,
            'clearCartOnLoad' => true,
        ]));
    }

    private function settings(): array
    {
        if ($this->settings === []) {
            $this->settings = array_merge(SiteDefaults::settings(), $this->settingModel->getMap());
        }

        return $this->settings;
    }

    private function setting(string $key, string $default = ''): string
    {
        return $this->settings()[$key] ?? $default;
    }

    private function jsonSetting(string $key, array $default = []): array
    {
        $decoded = json_decode($this->setting($key), true);

        return is_array($decoded) ? $decoded : $default;
    }

    private function assetUrl(?string $path): string
    {
        $path = trim((string) $path);

        if ($path === '') {
            return '';
        }

        if (preg_match('/^https?:\/\//i', $path)) {
            return $path;
        }

        return base_url(ltrim($path, '/'));
    }

    private function resolveLink(?string $path): string
    {
        $path = trim((string) $path);

        if ($path === '') {
            return site_url('/');
        }

        if (preg_match('/^https?:\/\//i', $path) || str_starts_with($path, '#')) {
            return $path;
        }

        return site_url(ltrim($path, '/'));
    }

    /**
     * @return array<string, mixed>
     */
    private function brandData(): array
    {
        $ui = $this->settings();

        return [
            'ui' => $ui,
            'brand' => [
                'name'            => $this->setting('brand_name'),
                'tagline'         => $this->setting('brand_tagline'),
                'logo'            => $this->assetUrl($this->setting('brand_logo')),
                'address'         => $this->setting('brand_address'),
                'phone_primary'   => $this->setting('brand_phone_primary'),
                'phone_secondary' => $this->setting('brand_phone_secondary'),
                'email'           => $this->setting('brand_email'),
                'hours_weekday'   => $this->setting('brand_hours_weekday'),
                'hours_weekend'   => $this->setting('brand_hours_weekend'),
                'hours_note'      => $this->setting('brand_hours_note'),
                'gallery_anchor'  => site_url('gallery'),
                'menu_anchor'     => site_url('menu'),
                'cart_anchor'     => site_url('cart'),
                'reserve_anchor'  => site_url('book-table'),
                'contact_anchor'  => site_url('/') . '#reserve-contact',
                'whatsapp_url'    => 'https://wa.me/' . preg_replace('/\D+/', '', $this->setting('whatsapp_number')),
                'footer_note'     => $this->setting('footer_note'),
            ],
        ];
    }

    /**
     * @return list<array<string, string>>
     */
    private function menuSections(): array
    {
        $categories = $this->categoryModel
            ->where('is_active', 1)
            ->orderBy('sort_order', 'ASC')
            ->findAll();

        return array_map(fn (array $category): array => [
            'title'       => $category['name'],
            'subtitle'    => $category['subtitle'] ?: 'la majestic selection',
            'description' => $category['description'] ?: 'Explore one of the signature food collections from La Majestic.',
            'image'       => $this->assetUrl($category['image']),
        ], $categories);
    }

    /**
     * @return list<string>
     */
    private function galleryImages(): array
    {
        return array_map(
            fn (array $item): string => $this->assetUrl($item['image']),
            $this->galleryItemModel->where('is_active', 1)->orderBy('sort_order', 'ASC')->findAll()
        );
    }

    /**
     * @return list<string>
     */
    private function reservationSlots(): array
    {
        return $this->jsonSetting('reservation_slots_json', ['2 Guests', '4 Guests', '6 Guests', 'Large Group']);
    }

    /**
     * @return list<string>
     */
    private function serviceModes(): array
    {
        return $this->jsonSetting('service_modes_json', ['Dinner Table', 'Private Celebration', 'Date Night', 'Group Dining']);
    }

    /**
     * @return list<array<string, string>>
     */
    private function strengths(): array
    {
        $strengths = $this->jsonSetting('strengths_json', []);

        return array_map(function (array $item): array {
            return [
                'title' => $item['title'] ?? 'La Majestic',
                'text'  => $item['text'] ?? '',
                'icon'  => $this->assetUrl($item['icon'] ?? ''),
            ];
        }, $strengths);
    }

    /**
     * @return list<array<string, mixed>>
     */
    private function heroSlides(): array
    {
        return array_map(function (array $slide): array {
            return [
                'eyebrow'      => $slide['eyebrow'],
                'title'        => $slide['title'],
                'text'         => $slide['text'],
                'image'        => $this->assetUrl($slide['image']),
                'button_label' => $slide['button_label'] ?: 'Explore',
                'button_link'  => $this->resolveLink($slide['button_link']),
            ];
        }, $this->heroSlideModel->where('is_active', 1)->orderBy('sort_order', 'ASC')->findAll());
    }

    /**
     * @return list<array<string, mixed>>
     */
    private function offers(): array
    {
        return array_map(function (array $offer): array {
            return [
                'name'        => $offer['title'],
                'title'       => $offer['title'],
                'subtitle'    => $offer['subtitle'],
                'description' => $offer['description'],
                'image'       => $this->assetUrl($offer['image']),
                'button_label'=> $offer['button_label'],
                'button_link' => $this->resolveLink($offer['button_link']),
            ];
        }, $this->offerModel->where('is_active', 1)->orderBy('sort_order', 'ASC')->findAll());
    }

    /**
     * @return list<array<string, mixed>>
     */
    private function testimonials(): array
    {
        return array_map(function (array $testimonial): array {
            return [
                'quote'  => $testimonial['quote'],
                'author' => $testimonial['author'],
                'image'  => $this->assetUrl($testimonial['image']),
            ];
        }, $this->testimonialModel->where('is_active', 1)->orderBy('sort_order', 'ASC')->findAll());
    }

    /**
     * @return list<array<string, mixed>>
     */
    private function catalog(): array
    {
        $rows = $this->productModel
            ->select('products.*, categories.name as category_name')
            ->join('categories', 'categories.id = products.category_id', 'left')
            ->where('products.is_active', 1)
            ->orderBy('products.sort_order', 'ASC')
            ->orderBy('products.id', 'ASC')
            ->findAll();

        return array_map(function (array $row): array {
            $notes = preg_split('/\r\n|\r|\n/', (string) ($row['notes'] ?? ''));
            $notes = array_values(array_filter(array_map('trim', $notes ?: [])));

            return [
                'id'               => $row['id'],
                'slug'             => $row['slug'],
                'name'             => $row['name'],
                'subtitle'         => $row['subtitle'] ?: $row['short_description'],
                'category'         => $row['category_name'] ?: 'Signature',
                'price'            => (float) $row['price'],
                'original_price'   => $row['original_price'] !== null ? (float) $row['original_price'] : (float) $row['price'],
                'badge'            => $row['badge'] ?: 'House Special',
                'accent'           => $row['accent'] ?: '',
                'rating'           => $row['rating'] ?: '4.8',
                'prep_time'        => $row['prep_time'] ?: 'Freshly prepared',
                'serves'           => $row['serves'] ?: 'Signature plate',
                'description'      => $row['short_description'] ?: $row['subtitle'] ?: '',
                'long_description' => $row['description'] ?: $row['short_description'] ?: '',
                'image'            => $this->assetUrl($row['image']),
                'notes'            => $notes,
                'is_featured'      => (int) $row['is_featured'],
            ];
        }, $rows);
    }

    /**
     * @param array<string, mixed> $payload
     */
    private function createOrder(array $payload): int
    {
        $this->orderModel->insert($payload);
        $orderId = (int) $this->orderModel->getInsertID();
        $reference = 'LM' . str_pad((string) $orderId, 6, '0', STR_PAD_LEFT);
        $this->orderModel->update($orderId, ['order_reference' => $reference]);

        return $orderId;
    }

    private function stripeEnabled(): bool
    {
        return trim($this->setting('stripe_secret_key')) !== '';
    }

    /**
     * @param mixed $items
     * @return list<array<string, mixed>>
     */
    private function resolveCheckoutItems($items): array
    {
        if (! is_array($items)) {
            return [];
        }

        $catalogBySlug = [];
        $catalogByName = [];

        foreach ($this->catalog() as $product) {
            $catalogBySlug[$product['slug']] = $product;
            $catalogByName[strtolower($product['name'])] = $product;
        }

        $resolved = [];

        foreach ($items as $item) {
            if (! is_array($item)) {
                continue;
            }

            $slug = trim((string) ($item['slug'] ?? ''));
            $name = trim((string) ($item['name'] ?? ''));
            $product = $slug !== ''
                ? ($catalogBySlug[$slug] ?? null)
                : ($catalogByName[strtolower($name)] ?? null);

            if ($product === null) {
                continue;
            }

            $quantity = max((int) ($item['quantity'] ?? 1), 1);
            $key = $product['slug'];

            if (! isset($resolved[$key])) {
                $resolved[$key] = [
                    'id'       => $product['id'],
                    'slug'     => $product['slug'],
                    'name'     => $product['name'],
                    'price'    => (float) $product['price'],
                    'image'    => $product['image'],
                    'quantity' => 0,
                ];
            }

            $resolved[$key]['quantity'] += $quantity;
        }

        return array_values($resolved);
    }

    /**
     * @param list<array<string, mixed>> $items
     */
    private function calculateSubtotal(array $items): float
    {
        $subtotal = 0.0;

        foreach ($items as $item) {
            $subtotal += ((float) ($item['price'] ?? 0)) * max((int) ($item['quantity'] ?? 1), 1);
        }

        return $subtotal;
    }

    /**
     * @param array<string, mixed> $order
     * @param list<array<string, mixed>> $items
     * @return array<string, mixed>
     */
    private function buildStripeCheckoutPayload(array $order, array $items, string $currency): array
    {
        $payload = [
            'mode' => 'payment',
            'success_url' => site_url('checkout/success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => site_url('checkout/cancel') . '?order=' . rawurlencode((string) $order['order_reference']),
            'customer_email' => $order['email'],
            'client_reference_id' => $order['order_reference'],
            'phone_number_collection' => ['enabled' => true],
            'metadata' => [
                'order_id' => (string) $order['id'],
                'order_reference' => (string) $order['order_reference'],
            ],
            'payment_method_types' => ['card'],
            'line_items' => [],
        ];

        foreach ($items as $item) {
            $name = (string) ($item['name'] ?? 'Dish');
            $price = (float) ($item['price'] ?? 0);
            $quantity = max((int) ($item['quantity'] ?? 1), 1);

            $payload['line_items'][] = [
                'price_data' => [
                    'currency' => $currency,
                    'product_data' => [
                        'name' => $name,
                    ],
                    'unit_amount' => (int) round($price * 100),
                ],
                'quantity' => $quantity,
            ];
        }

        return $payload;
    }

    private function findProduct(string $slug): ?array
    {
        foreach ($this->catalog() as $product) {
            if ($product['slug'] === $slug) {
                return $product;
            }
        }

        return null;
    }

    private function normalizeDate(string $value): ?string
    {
        $value = trim($value);

        if ($value === '') {
            return null;
        }

        $formats = ['d-m-Y', 'd/m/Y', 'Y-m-d', 'm/d/Y'];

        foreach ($formats as $format) {
            $date = \DateTime::createFromFormat($format, $value);
            if ($date instanceof \DateTime) {
                return $date->format('Y-m-d');
            }
        }

        $timestamp = strtotime($value);

        return $timestamp ? date('Y-m-d', $timestamp) : null;
    }
}
