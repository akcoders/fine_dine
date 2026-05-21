<?php

namespace App\Controllers\Admin;

use App\Libraries\SiteDefaults;
use App\Models\ProductModel;
use App\Models\SettingModel;

class SettingsController extends BaseAdminController
{
    public function index(): string
    {
        $storedSettings = (new SettingModel())->getMap();

        return $this->render('settings/index', [
            'title' => 'Site Settings',
            'settings' => array_merge(SiteDefaults::settings(), $storedSettings),
            'products' => (new ProductModel())->orderBy('name', 'ASC')->findAll(),
        ]);
    }

    public function save()
    {
        $model = new SettingModel();
        $settings = array_merge(SiteDefaults::settings(), $model->getMap());

        $logo = $this->uploadImage('brand_logo_file', 'settings', $this->cleanPath($this->request->getPost('brand_logo')) ?: ($settings['brand_logo'] ?? null));
        $storyImagePrimary = $this->uploadImage('home_story_image_primary_file', 'settings', $this->cleanPath($this->request->getPost('home_story_image_primary')) ?: ($settings['home_story_image_primary'] ?? null));
        $storyImageSecondary = $this->uploadImage('home_story_image_secondary_file', 'settings', $this->cleanPath($this->request->getPost('home_story_image_secondary')) ?: ($settings['home_story_image_secondary'] ?? null));
        $menuBannerImage = $this->uploadImage('menu_banner_image_file', 'settings', $this->cleanPath($this->request->getPost('menu_banner_image')) ?: ($settings['menu_banner_image'] ?? null));
        $menuCtaImage = $this->uploadImage('menu_cta_image_file', 'settings', $this->cleanPath($this->request->getPost('menu_cta_image')) ?: ($settings['menu_cta_image'] ?? null));
        $galleryBannerImage = $this->uploadImage('gallery_banner_image_file', 'settings', $this->cleanPath($this->request->getPost('gallery_banner_image')) ?: ($settings['gallery_banner_image'] ?? null));
        $bookingBannerImage = $this->uploadImage('booking_banner_image_file', 'settings', $this->cleanPath($this->request->getPost('booking_banner_image')) ?: ($settings['booking_banner_image'] ?? null));
        $cartBannerImage = $this->uploadImage('cart_banner_image_file', 'settings', $this->cleanPath($this->request->getPost('cart_banner_image')) ?: ($settings['cart_banner_image'] ?? null));

        $model->upsertMany([
            'brand_name'                 => (string) $this->request->getPost('brand_name'),
            'brand_tagline'              => (string) $this->request->getPost('brand_tagline'),
            'brand_logo'                 => $logo ?? '',
            'brand_address'              => (string) $this->request->getPost('brand_address'),
            'brand_phone_primary'        => (string) $this->request->getPost('brand_phone_primary'),
            'brand_phone_secondary'      => (string) $this->request->getPost('brand_phone_secondary'),
            'brand_email'                => (string) $this->request->getPost('brand_email'),
            'brand_hours_weekday'        => (string) $this->request->getPost('brand_hours_weekday'),
            'brand_hours_weekend'        => (string) $this->request->getPost('brand_hours_weekend'),
            'brand_hours_note'           => (string) $this->request->getPost('brand_hours_note'),
            'whatsapp_number'            => (string) $this->request->getPost('whatsapp_number'),
            'nav_home_label'             => (string) $this->request->getPost('nav_home_label'),
            'nav_gallery_label'          => (string) $this->request->getPost('nav_gallery_label'),
            'nav_menu_label'             => (string) $this->request->getPost('nav_menu_label'),
            'nav_cart_label'             => (string) $this->request->getPost('nav_cart_label'),
            'nav_book_label'             => (string) $this->request->getPost('nav_book_label'),
            'nav_contact_label'          => (string) $this->request->getPost('nav_contact_label'),
            'header_visit_title'         => (string) $this->request->getPost('header_visit_title'),
            'header_booking_title'       => (string) $this->request->getPost('header_booking_title'),
            'header_find_table_label'    => (string) $this->request->getPost('header_find_table_label'),
            'header_cart_label'          => (string) $this->request->getPost('header_cart_label'),
            'mobile_book_label'          => (string) $this->request->getPost('mobile_book_label'),
            'footer_navigation_heading'  => (string) $this->request->getPost('footer_navigation_heading'),
            'footer_reservations_heading'=> (string) $this->request->getPost('footer_reservations_heading'),
            'footer_call_label'          => (string) $this->request->getPost('footer_call_label'),
            'footer_email_label'         => (string) $this->request->getPost('footer_email_label'),
            'footer_map_label'           => (string) $this->request->getPost('footer_map_label'),
            'footer_reserve_label'       => (string) $this->request->getPost('footer_reserve_label'),
            'footer_cart_summary_label'  => (string) $this->request->getPost('footer_cart_summary_label'),
            'footer_copyright_suffix'    => (string) $this->request->getPost('footer_copyright_suffix'),
            'label_book_table'           => (string) $this->request->getPost('label_book_table'),
            'label_add_to_cart'          => (string) $this->request->getPost('label_add_to_cart'),
            'label_details'              => (string) $this->request->getPost('label_details'),
            'label_view_all_menu'        => (string) $this->request->getPost('label_view_all_menu'),
            'label_view_details'         => (string) $this->request->getPost('label_view_details'),
            'label_browse_menu'          => (string) $this->request->getPost('label_browse_menu'),
            'label_send_whatsapp'        => (string) $this->request->getPost('label_send_whatsapp'),
            'label_email_enquiry'        => (string) $this->request->getPost('label_email_enquiry'),
            'label_clear_cart'           => (string) $this->request->getPost('label_clear_cart'),
            'label_continue_takeaway'    => (string) $this->request->getPost('label_continue_takeaway'),
            'label_send_enquiry'         => (string) $this->request->getPost('label_send_enquiry'),
            'label_submit_takeaway'      => (string) $this->request->getPost('label_submit_takeaway'),
            'label_view_cart_and_order'  => (string) $this->request->getPost('label_view_cart_and_order'),
            'label_go_to_reservation'    => (string) $this->request->getPost('label_go_to_reservation'),
            'label_take_away_this_dish'  => (string) $this->request->getPost('label_take_away_this_dish'),
            'home_offer_heading'         => (string) $this->request->getPost('home_offer_heading'),
            'home_offer_text'            => (string) $this->request->getPost('home_offer_text'),
            'home_offer_subtitle'        => (string) $this->request->getPost('home_offer_subtitle'),
            'home_story_title'           => (string) $this->request->getPost('home_story_title'),
            'home_story_text'            => (string) $this->request->getPost('home_story_text'),
            'home_story_subtitle'        => (string) $this->request->getPost('home_story_subtitle'),
            'home_story_cta_label'       => (string) $this->request->getPost('home_story_cta_label'),
            'home_story_image_primary'   => $storyImagePrimary ?? '',
            'home_story_image_secondary' => $storyImageSecondary ?? '',
            'home_special_dish_subtitle' => (string) $this->request->getPost('home_special_dish_subtitle'),
            'special_dish_slug'          => (string) $this->request->getPost('special_dish_slug'),
            'home_menu_subtitle'         => (string) $this->request->getPost('home_menu_subtitle'),
            'home_menu_heading'          => (string) $this->request->getPost('home_menu_heading'),
            'home_menu_cta_label'        => (string) $this->request->getPost('home_menu_cta_label'),
            'home_special_offer_subtitle'=> (string) $this->request->getPost('home_special_offer_subtitle'),
            'home_special_offer_heading' => (string) $this->request->getPost('home_special_offer_heading'),
            'home_special_offer_cta_label' => (string) $this->request->getPost('home_special_offer_cta_label'),
            'home_gallery_subtitle'      => (string) $this->request->getPost('home_gallery_subtitle'),
            'home_gallery_heading'       => (string) $this->request->getPost('home_gallery_heading'),
            'home_contact_title'         => (string) $this->request->getPost('home_contact_title'),
            'home_contact_form_button_label' => (string) $this->request->getPost('home_contact_form_button_label'),
            'home_strength_subtitle'     => (string) $this->request->getPost('home_strength_subtitle'),
            'home_strength_heading'      => (string) $this->request->getPost('home_strength_heading'),
            'reservation_heading'        => (string) $this->request->getPost('reservation_heading'),
            'reservation_text'           => (string) $this->request->getPost('reservation_text'),
            'gallery_page_intro'         => (string) $this->request->getPost('gallery_page_intro'),
            'booking_page_intro'         => (string) $this->request->getPost('booking_page_intro'),
            'menu_page_intro'            => (string) $this->request->getPost('menu_page_intro'),
            'cart_summary_text'          => (string) $this->request->getPost('cart_summary_text'),
            'footer_note'                => (string) $this->request->getPost('footer_note'),
            'menu_banner_image'          => $menuBannerImage ?? '',
            'menu_banner_subtitle'       => (string) $this->request->getPost('menu_banner_subtitle'),
            'menu_banner_title'          => (string) $this->request->getPost('menu_banner_title'),
            'menu_cta_title'             => (string) $this->request->getPost('menu_cta_title'),
            'menu_cta_text'              => (string) $this->request->getPost('menu_cta_text'),
            'menu_cta_cart_label'        => (string) $this->request->getPost('menu_cta_cart_label'),
            'menu_cta_book_label'        => (string) $this->request->getPost('menu_cta_book_label'),
            'menu_cta_image'             => $menuCtaImage ?? '',
            'gallery_banner_image'       => $galleryBannerImage ?? '',
            'gallery_banner_subtitle'    => (string) $this->request->getPost('gallery_banner_subtitle'),
            'gallery_banner_title'       => (string) $this->request->getPost('gallery_banner_title'),
            'gallery_subtitle'           => (string) $this->request->getPost('gallery_subtitle'),
            'gallery_heading'            => (string) $this->request->getPost('gallery_heading'),
            'booking_banner_image'       => $bookingBannerImage ?? '',
            'booking_banner_subtitle'    => (string) $this->request->getPost('booking_banner_subtitle'),
            'booking_banner_title'       => (string) $this->request->getPost('booking_banner_title'),
            'booking_subtitle'           => (string) $this->request->getPost('booking_subtitle'),
            'booking_heading'            => (string) $this->request->getPost('booking_heading'),
            'booking_request_text'       => (string) $this->request->getPost('booking_request_text'),
            'booking_button_label'       => (string) $this->request->getPost('booking_button_label'),
            'booking_footer_note'        => (string) $this->request->getPost('booking_footer_note'),
            'booking_location_title'     => (string) $this->request->getPost('booking_location_title'),
            'booking_address_label'      => (string) $this->request->getPost('booking_address_label'),
            'booking_email_label'        => (string) $this->request->getPost('booking_email_label'),
            'booking_hours_label'        => (string) $this->request->getPost('booking_hours_label'),
            'booking_closed_label'       => (string) $this->request->getPost('booking_closed_label'),
            'booking_map_embed'          => (string) $this->request->getPost('booking_map_embed'),
            'cart_banner_image'          => $cartBannerImage ?? '',
            'cart_banner_subtitle'       => (string) $this->request->getPost('cart_banner_subtitle'),
            'cart_banner_title'          => (string) $this->request->getPost('cart_banner_title'),
            'cart_title'                 => (string) $this->request->getPost('cart_title'),
            'cart_intro'                 => (string) $this->request->getPost('cart_intro'),
            'cart_empty_title'           => (string) $this->request->getPost('cart_empty_title'),
            'cart_empty_text'            => (string) $this->request->getPost('cart_empty_text'),
            'cart_summary_subtitle'      => (string) $this->request->getPost('cart_summary_subtitle'),
            'cart_summary_title'         => (string) $this->request->getPost('cart_summary_title'),
            'cart_items_label'           => (string) $this->request->getPost('cart_items_label'),
            'cart_subtotal_label'        => (string) $this->request->getPost('cart_subtotal_label'),
            'cart_mode_heading'          => (string) $this->request->getPost('cart_mode_heading'),
            'cart_mode_dinein_title'     => (string) $this->request->getPost('cart_mode_dinein_title'),
            'cart_mode_dinein_text'      => (string) $this->request->getPost('cart_mode_dinein_text'),
            'cart_mode_takeaway_title'   => (string) $this->request->getPost('cart_mode_takeaway_title'),
            'cart_mode_takeaway_text'    => (string) $this->request->getPost('cart_mode_takeaway_text'),
            'checkout_payment_heading'   => (string) $this->request->getPost('checkout_payment_heading'),
            'checkout_cash_title'        => (string) $this->request->getPost('checkout_cash_title'),
            'checkout_cash_text'         => (string) $this->request->getPost('checkout_cash_text'),
            'checkout_online_title'      => (string) $this->request->getPost('checkout_online_title'),
            'checkout_online_text'       => (string) $this->request->getPost('checkout_online_text'),
            'checkout_online_unavailable_text' => (string) $this->request->getPost('checkout_online_unavailable_text'),
            'cart_help_title'            => (string) $this->request->getPost('cart_help_title'),
            'cart_form_name_label'       => (string) $this->request->getPost('cart_form_name_label'),
            'cart_form_phone_label'      => (string) $this->request->getPost('cart_form_phone_label'),
            'cart_form_email_label'      => (string) $this->request->getPost('cart_form_email_label'),
            'cart_form_notes_label'      => (string) $this->request->getPost('cart_form_notes_label'),
            'cart_form_notes_placeholder'=> (string) $this->request->getPost('cart_form_notes_placeholder'),
            'cart_recommended_subtitle'  => (string) $this->request->getPost('cart_recommended_subtitle'),
            'cart_recommended_heading'   => (string) $this->request->getPost('cart_recommended_heading'),
            'checkout_success_title'     => (string) $this->request->getPost('checkout_success_title'),
            'checkout_success_text'      => (string) $this->request->getPost('checkout_success_text'),
            'checkout_cancel_title'      => (string) $this->request->getPost('checkout_cancel_title'),
            'checkout_cancel_text'       => (string) $this->request->getPost('checkout_cancel_text'),
            'checkout_back_to_cart_label'=> (string) $this->request->getPost('checkout_back_to_cart_label'),
            'checkout_view_menu_label'   => (string) $this->request->getPost('checkout_view_menu_label'),
            'stripe_publishable_key'     => (string) $this->request->getPost('stripe_publishable_key'),
            'stripe_secret_key'          => (string) $this->request->getPost('stripe_secret_key'),
            'stripe_currency'            => (string) $this->request->getPost('stripe_currency'),
            'product_rating_label'       => (string) $this->request->getPost('product_rating_label'),
            'product_related_subtitle'   => (string) $this->request->getPost('product_related_subtitle'),
            'product_related_heading'    => (string) $this->request->getPost('product_related_heading'),
            'reservation_slots_json'     => (string) $this->request->getPost('reservation_slots_json'),
            'service_modes_json'         => (string) $this->request->getPost('service_modes_json'),
            'strengths_json'             => (string) $this->request->getPost('strengths_json'),
        ]);

        return redirect()->to(site_url('admin/settings'))->with('success', 'Settings saved.');
    }
}
