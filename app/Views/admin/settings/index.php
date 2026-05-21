<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<form method="post" enctype="multipart/form-data" action="<?= site_url('admin/settings') ?>">
    <div class="accordion" id="settingsAccordion">
        <div class="accordion-item admin-card mb-3">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#brandSettings">Brand & Contact</button>
            </h2>
            <div id="brandSettings" class="accordion-collapse collapse show" data-bs-parent="#settingsAccordion">
                <div class="accordion-body">
                    <div class="row g-4">
                        <div class="col-md-6"><label class="form-label">Brand Name</label><input type="text" name="brand_name" class="form-control" value="<?= esc($settings['brand_name']) ?>"></div>
                        <div class="col-md-6"><label class="form-label">Tagline</label><input type="text" name="brand_tagline" class="form-control" value="<?= esc($settings['brand_tagline']) ?>"></div>
                        <div class="col-md-6"><label class="form-label">Logo Path</label><input type="text" name="brand_logo" class="form-control" value="<?= esc($settings['brand_logo']) ?>"></div>
                        <div class="col-md-6"><label class="form-label">Upload New Logo</label><input type="file" name="brand_logo_file" class="form-control"></div>
                        <div class="col-12"><label class="form-label">Address</label><input type="text" name="brand_address" class="form-control" value="<?= esc($settings['brand_address']) ?>"></div>
                        <div class="col-md-4"><label class="form-label">Primary Phone</label><input type="text" name="brand_phone_primary" class="form-control" value="<?= esc($settings['brand_phone_primary']) ?>"></div>
                        <div class="col-md-4"><label class="form-label">Secondary Phone</label><input type="text" name="brand_phone_secondary" class="form-control" value="<?= esc($settings['brand_phone_secondary']) ?>"></div>
                        <div class="col-md-4"><label class="form-label">WhatsApp Number</label><input type="text" name="whatsapp_number" class="form-control" value="<?= esc($settings['whatsapp_number']) ?>"></div>
                        <div class="col-md-6"><label class="form-label">Email</label><input type="email" name="brand_email" class="form-control" value="<?= esc($settings['brand_email']) ?>"></div>
                        <div class="col-md-6"><label class="form-label">Footer Note</label><input type="text" name="footer_note" class="form-control" value="<?= esc($settings['footer_note']) ?>"></div>
                        <div class="col-md-4"><label class="form-label">Weekday Hours</label><input type="text" name="brand_hours_weekday" class="form-control" value="<?= esc($settings['brand_hours_weekday']) ?>"></div>
                        <div class="col-md-4"><label class="form-label">Weekend Hours</label><input type="text" name="brand_hours_weekend" class="form-control" value="<?= esc($settings['brand_hours_weekend']) ?>"></div>
                        <div class="col-md-4"><label class="form-label">Hours Note</label><input type="text" name="brand_hours_note" class="form-control" value="<?= esc($settings['brand_hours_note']) ?>"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="accordion-item admin-card mb-3">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sharedLabels">Header, Footer & Shared Labels</button>
            </h2>
            <div id="sharedLabels" class="accordion-collapse collapse" data-bs-parent="#settingsAccordion">
                <div class="accordion-body">
                    <div class="row g-4">
                        <div class="col-md-4"><label class="form-label">Nav Home</label><input type="text" name="nav_home_label" class="form-control" value="<?= esc($settings['nav_home_label']) ?>"></div>
                        <div class="col-md-4"><label class="form-label">Nav Gallery</label><input type="text" name="nav_gallery_label" class="form-control" value="<?= esc($settings['nav_gallery_label']) ?>"></div>
                        <div class="col-md-4"><label class="form-label">Nav Menu</label><input type="text" name="nav_menu_label" class="form-control" value="<?= esc($settings['nav_menu_label']) ?>"></div>
                        <div class="col-md-4"><label class="form-label">Nav Cart</label><input type="text" name="nav_cart_label" class="form-control" value="<?= esc($settings['nav_cart_label']) ?>"></div>
                        <div class="col-md-4"><label class="form-label">Nav Book</label><input type="text" name="nav_book_label" class="form-control" value="<?= esc($settings['nav_book_label']) ?>"></div>
                        <div class="col-md-4"><label class="form-label">Nav Contact</label><input type="text" name="nav_contact_label" class="form-control" value="<?= esc($settings['nav_contact_label']) ?>"></div>
                        <div class="col-md-3"><label class="form-label">Visit Title</label><input type="text" name="header_visit_title" class="form-control" value="<?= esc($settings['header_visit_title']) ?>"></div>
                        <div class="col-md-3"><label class="form-label">Booking Title</label><input type="text" name="header_booking_title" class="form-control" value="<?= esc($settings['header_booking_title']) ?>"></div>
                        <div class="col-md-3"><label class="form-label">Find Table Button</label><input type="text" name="header_find_table_label" class="form-control" value="<?= esc($settings['header_find_table_label']) ?>"></div>
                        <div class="col-md-3"><label class="form-label">Header Cart Button</label><input type="text" name="header_cart_label" class="form-control" value="<?= esc($settings['header_cart_label']) ?>"></div>
                        <div class="col-md-3"><label class="form-label">Mobile Book Button</label><input type="text" name="mobile_book_label" class="form-control" value="<?= esc($settings['mobile_book_label']) ?>"></div>
                        <div class="col-md-3"><label class="form-label">Footer Navigation Heading</label><input type="text" name="footer_navigation_heading" class="form-control" value="<?= esc($settings['footer_navigation_heading']) ?>"></div>
                        <div class="col-md-3"><label class="form-label">Footer Reservations Heading</label><input type="text" name="footer_reservations_heading" class="form-control" value="<?= esc($settings['footer_reservations_heading']) ?>"></div>
                        <div class="col-md-3"><label class="form-label">Copyright Suffix</label><input type="text" name="footer_copyright_suffix" class="form-control" value="<?= esc($settings['footer_copyright_suffix']) ?>"></div>

                        <div class="col-md-3"><label class="form-label">Call Label</label><input type="text" name="footer_call_label" class="form-control" value="<?= esc($settings['footer_call_label']) ?>"></div>
                        <div class="col-md-3"><label class="form-label">Email Label</label><input type="text" name="footer_email_label" class="form-control" value="<?= esc($settings['footer_email_label']) ?>"></div>
                        <div class="col-md-3"><label class="form-label">Map Label</label><input type="text" name="footer_map_label" class="form-control" value="<?= esc($settings['footer_map_label']) ?>"></div>
                        <div class="col-md-3"><label class="form-label">Reserve Label</label><input type="text" name="footer_reserve_label" class="form-control" value="<?= esc($settings['footer_reserve_label']) ?>"></div>
                        <div class="col-md-3"><label class="form-label">Cart Summary Label</label><input type="text" name="footer_cart_summary_label" class="form-control" value="<?= esc($settings['footer_cart_summary_label']) ?>"></div>

                        <div class="col-md-3"><label class="form-label">Book Table Label</label><input type="text" name="label_book_table" class="form-control" value="<?= esc($settings['label_book_table']) ?>"></div>
                        <div class="col-md-3"><label class="form-label">Add To Cart Label</label><input type="text" name="label_add_to_cart" class="form-control" value="<?= esc($settings['label_add_to_cart']) ?>"></div>
                        <div class="col-md-3"><label class="form-label">Details Label</label><input type="text" name="label_details" class="form-control" value="<?= esc($settings['label_details']) ?>"></div>
                        <div class="col-md-3"><label class="form-label">View Details Label</label><input type="text" name="label_view_details" class="form-control" value="<?= esc($settings['label_view_details']) ?>"></div>
                        <div class="col-md-3"><label class="form-label">View All Menu Label</label><input type="text" name="label_view_all_menu" class="form-control" value="<?= esc($settings['label_view_all_menu']) ?>"></div>
                        <div class="col-md-3"><label class="form-label">Browse Menu Label</label><input type="text" name="label_browse_menu" class="form-control" value="<?= esc($settings['label_browse_menu']) ?>"></div>
                        <div class="col-md-3"><label class="form-label">Send WhatsApp Label</label><input type="text" name="label_send_whatsapp" class="form-control" value="<?= esc($settings['label_send_whatsapp']) ?>"></div>
                        <div class="col-md-3"><label class="form-label">Email Enquiry Label</label><input type="text" name="label_email_enquiry" class="form-control" value="<?= esc($settings['label_email_enquiry']) ?>"></div>
                        <div class="col-md-3"><label class="form-label">Clear Cart Label</label><input type="text" name="label_clear_cart" class="form-control" value="<?= esc($settings['label_clear_cart']) ?>"></div>
                        <div class="col-md-3"><label class="form-label">Continue Take Away Label</label><input type="text" name="label_continue_takeaway" class="form-control" value="<?= esc($settings['label_continue_takeaway']) ?>"></div>
                        <div class="col-md-3"><label class="form-label">Send Enquiry Label</label><input type="text" name="label_send_enquiry" class="form-control" value="<?= esc($settings['label_send_enquiry']) ?>"></div>
                        <div class="col-md-3"><label class="form-label">Submit Takeaway Label</label><input type="text" name="label_submit_takeaway" class="form-control" value="<?= esc($settings['label_submit_takeaway']) ?>"></div>
                        <div class="col-md-3"><label class="form-label">View Cart & Order Label</label><input type="text" name="label_view_cart_and_order" class="form-control" value="<?= esc($settings['label_view_cart_and_order']) ?>"></div>
                        <div class="col-md-3"><label class="form-label">Go To Reservation Label</label><input type="text" name="label_go_to_reservation" class="form-control" value="<?= esc($settings['label_go_to_reservation']) ?>"></div>
                        <div class="col-md-3"><label class="form-label">Hero Take Away Label</label><input type="text" name="label_take_away_this_dish" class="form-control" value="<?= esc($settings['label_take_away_this_dish']) ?>"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="accordion-item admin-card mb-3">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#homeContent">Homepage Sections</button>
            </h2>
            <div id="homeContent" class="accordion-collapse collapse" data-bs-parent="#settingsAccordion">
                <div class="accordion-body">
                    <div class="row g-4">
                        <div class="col-md-6"><label class="form-label">Offer Subtitle</label><input type="text" name="home_offer_subtitle" class="form-control" value="<?= esc($settings['home_offer_subtitle']) ?>"></div>
                        <div class="col-md-6"><label class="form-label">Offer Heading</label><input type="text" name="home_offer_heading" class="form-control" value="<?= esc($settings['home_offer_heading']) ?>"></div>
                        <div class="col-12"><label class="form-label">Offer Intro</label><textarea name="home_offer_text" rows="3" class="form-control"><?= esc($settings['home_offer_text']) ?></textarea></div>

                        <div class="col-md-4"><label class="form-label">Story Subtitle</label><input type="text" name="home_story_subtitle" class="form-control" value="<?= esc($settings['home_story_subtitle']) ?>"></div>
                        <div class="col-md-4"><label class="form-label">Story Heading</label><input type="text" name="home_story_title" class="form-control" value="<?= esc($settings['home_story_title']) ?>"></div>
                        <div class="col-md-4"><label class="form-label">Story Button Label</label><input type="text" name="home_story_cta_label" class="form-control" value="<?= esc($settings['home_story_cta_label']) ?>"></div>
                        <div class="col-md-6"><label class="form-label">Story Image Primary</label><input type="text" name="home_story_image_primary" class="form-control" value="<?= esc($settings['home_story_image_primary']) ?>"></div>
                        <div class="col-md-6"><label class="form-label">Upload Primary Story Image</label><input type="file" name="home_story_image_primary_file" class="form-control"></div>
                        <div class="col-md-6"><label class="form-label">Story Image Secondary</label><input type="text" name="home_story_image_secondary" class="form-control" value="<?= esc($settings['home_story_image_secondary']) ?>"></div>
                        <div class="col-md-6"><label class="form-label">Upload Secondary Story Image</label><input type="file" name="home_story_image_secondary_file" class="form-control"></div>
                        <div class="col-12"><label class="form-label">Story Text</label><textarea name="home_story_text" rows="4" class="form-control"><?= esc($settings['home_story_text']) ?></textarea></div>

                        <div class="col-md-4"><label class="form-label">Special Dish Subtitle</label><input type="text" name="home_special_dish_subtitle" class="form-control" value="<?= esc($settings['home_special_dish_subtitle']) ?>"></div>
                        <div class="col-md-8"><label class="form-label">Special Dish Product</label>
                            <select name="special_dish_slug" class="form-select">
                                <?php foreach ($products as $product): ?>
                                    <option value="<?= esc($product['slug']) ?>" <?= $settings['special_dish_slug'] === $product['slug'] ? 'selected' : '' ?>><?= esc($product['name']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-md-4"><label class="form-label">Menu Subtitle</label><input type="text" name="home_menu_subtitle" class="form-control" value="<?= esc($settings['home_menu_subtitle']) ?>"></div>
                        <div class="col-md-4"><label class="form-label">Menu Heading</label><input type="text" name="home_menu_heading" class="form-control" value="<?= esc($settings['home_menu_heading']) ?>"></div>
                        <div class="col-md-4"><label class="form-label">Menu CTA Label</label><input type="text" name="home_menu_cta_label" class="form-control" value="<?= esc($settings['home_menu_cta_label']) ?>"></div>

                        <div class="col-md-4"><label class="form-label">Special Offer Subtitle</label><input type="text" name="home_special_offer_subtitle" class="form-control" value="<?= esc($settings['home_special_offer_subtitle']) ?>"></div>
                        <div class="col-md-4"><label class="form-label">Special Offer Heading</label><input type="text" name="home_special_offer_heading" class="form-control" value="<?= esc($settings['home_special_offer_heading']) ?>"></div>
                        <div class="col-md-4"><label class="form-label">Special Offer CTA Label</label><input type="text" name="home_special_offer_cta_label" class="form-control" value="<?= esc($settings['home_special_offer_cta_label']) ?>"></div>

                        <div class="col-md-4"><label class="form-label">Gallery Subtitle</label><input type="text" name="home_gallery_subtitle" class="form-control" value="<?= esc($settings['home_gallery_subtitle']) ?>"></div>
                        <div class="col-md-4"><label class="form-label">Gallery Heading</label><input type="text" name="home_gallery_heading" class="form-control" value="<?= esc($settings['home_gallery_heading']) ?>"></div>
                        <div class="col-md-4"><label class="form-label">Contact Title</label><input type="text" name="home_contact_title" class="form-control" value="<?= esc($settings['home_contact_title']) ?>"></div>
                        <div class="col-md-6"><label class="form-label">Contact Form Button</label><input type="text" name="home_contact_form_button_label" class="form-control" value="<?= esc($settings['home_contact_form_button_label']) ?>"></div>
                        <div class="col-md-3"><label class="form-label">Strength Subtitle</label><input type="text" name="home_strength_subtitle" class="form-control" value="<?= esc($settings['home_strength_subtitle']) ?>"></div>
                        <div class="col-md-3"><label class="form-label">Strength Heading</label><input type="text" name="home_strength_heading" class="form-control" value="<?= esc($settings['home_strength_heading']) ?>"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="accordion-item admin-card mb-3">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#menuPage">Menu Page</button>
            </h2>
            <div id="menuPage" class="accordion-collapse collapse" data-bs-parent="#settingsAccordion">
                <div class="accordion-body">
                    <div class="row g-4">
                        <div class="col-md-6"><label class="form-label">Banner Image</label><input type="text" name="menu_banner_image" class="form-control" value="<?= esc($settings['menu_banner_image']) ?>"></div>
                        <div class="col-md-6"><label class="form-label">Upload Banner Image</label><input type="file" name="menu_banner_image_file" class="form-control"></div>
                        <div class="col-md-4"><label class="form-label">Banner Subtitle</label><input type="text" name="menu_banner_subtitle" class="form-control" value="<?= esc($settings['menu_banner_subtitle']) ?>"></div>
                        <div class="col-md-8"><label class="form-label">Banner Title</label><input type="text" name="menu_banner_title" class="form-control" value="<?= esc($settings['menu_banner_title']) ?>"></div>
                        <div class="col-12"><label class="form-label">Menu Intro</label><textarea name="menu_page_intro" rows="3" class="form-control"><?= esc($settings['menu_page_intro']) ?></textarea></div>
                        <div class="col-md-4"><label class="form-label">CTA Title</label><input type="text" name="menu_cta_title" class="form-control" value="<?= esc($settings['menu_cta_title']) ?>"></div>
                        <div class="col-md-4"><label class="form-label">CTA Cart Label</label><input type="text" name="menu_cta_cart_label" class="form-control" value="<?= esc($settings['menu_cta_cart_label']) ?>"></div>
                        <div class="col-md-4"><label class="form-label">CTA Book Label</label><input type="text" name="menu_cta_book_label" class="form-control" value="<?= esc($settings['menu_cta_book_label']) ?>"></div>
                        <div class="col-12"><label class="form-label">CTA Text</label><textarea name="menu_cta_text" rows="3" class="form-control"><?= esc($settings['menu_cta_text']) ?></textarea></div>
                        <div class="col-md-6"><label class="form-label">CTA Image</label><input type="text" name="menu_cta_image" class="form-control" value="<?= esc($settings['menu_cta_image']) ?>"></div>
                        <div class="col-md-6"><label class="form-label">Upload CTA Image</label><input type="file" name="menu_cta_image_file" class="form-control"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="accordion-item admin-card mb-3">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#galleryPage">Gallery Page</button>
            </h2>
            <div id="galleryPage" class="accordion-collapse collapse" data-bs-parent="#settingsAccordion">
                <div class="accordion-body">
                    <div class="row g-4">
                        <div class="col-md-6"><label class="form-label">Banner Image</label><input type="text" name="gallery_banner_image" class="form-control" value="<?= esc($settings['gallery_banner_image']) ?>"></div>
                        <div class="col-md-6"><label class="form-label">Upload Banner Image</label><input type="file" name="gallery_banner_image_file" class="form-control"></div>
                        <div class="col-md-4"><label class="form-label">Banner Subtitle</label><input type="text" name="gallery_banner_subtitle" class="form-control" value="<?= esc($settings['gallery_banner_subtitle']) ?>"></div>
                        <div class="col-md-8"><label class="form-label">Banner Title</label><input type="text" name="gallery_banner_title" class="form-control" value="<?= esc($settings['gallery_banner_title']) ?>"></div>
                        <div class="col-md-6"><label class="form-label">Section Subtitle</label><input type="text" name="gallery_subtitle" class="form-control" value="<?= esc($settings['gallery_subtitle']) ?>"></div>
                        <div class="col-md-6"><label class="form-label">Section Heading</label><input type="text" name="gallery_heading" class="form-control" value="<?= esc($settings['gallery_heading']) ?>"></div>
                        <div class="col-12"><label class="form-label">Gallery Intro</label><textarea name="gallery_page_intro" rows="3" class="form-control"><?= esc($settings['gallery_page_intro']) ?></textarea></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="accordion-item admin-card mb-3">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bookingPage">Booking Page & Reservation Section</button>
            </h2>
            <div id="bookingPage" class="accordion-collapse collapse" data-bs-parent="#settingsAccordion">
                <div class="accordion-body">
                    <div class="row g-4">
                        <div class="col-md-6"><label class="form-label">Reservation Heading</label><input type="text" name="reservation_heading" class="form-control" value="<?= esc($settings['reservation_heading']) ?>"></div>
                        <div class="col-md-6"><label class="form-label">Reservation Intro</label><input type="text" name="reservation_text" class="form-control" value="<?= esc($settings['reservation_text']) ?>"></div>
                        <div class="col-md-6"><label class="form-label">Banner Image</label><input type="text" name="booking_banner_image" class="form-control" value="<?= esc($settings['booking_banner_image']) ?>"></div>
                        <div class="col-md-6"><label class="form-label">Upload Banner Image</label><input type="file" name="booking_banner_image_file" class="form-control"></div>
                        <div class="col-md-4"><label class="form-label">Banner Subtitle</label><input type="text" name="booking_banner_subtitle" class="form-control" value="<?= esc($settings['booking_banner_subtitle']) ?>"></div>
                        <div class="col-md-4"><label class="form-label">Banner Title</label><input type="text" name="booking_banner_title" class="form-control" value="<?= esc($settings['booking_banner_title']) ?>"></div>
                        <div class="col-md-4"><label class="form-label">Section Subtitle</label><input type="text" name="booking_subtitle" class="form-control" value="<?= esc($settings['booking_subtitle']) ?>"></div>
                        <div class="col-md-6"><label class="form-label">Section Heading</label><input type="text" name="booking_heading" class="form-control" value="<?= esc($settings['booking_heading']) ?>"></div>
                        <div class="col-md-6"><label class="form-label">Booking Button Label</label><input type="text" name="booking_button_label" class="form-control" value="<?= esc($settings['booking_button_label']) ?>"></div>
                        <div class="col-md-6"><label class="form-label">Booking Request Text</label><input type="text" name="booking_request_text" class="form-control" value="<?= esc($settings['booking_request_text']) ?>"></div>
                        <div class="col-md-6"><label class="form-label">Page Intro</label><input type="text" name="booking_page_intro" class="form-control" value="<?= esc($settings['booking_page_intro']) ?>"></div>
                        <div class="col-12"><label class="form-label">Booking Footer Note</label><textarea name="booking_footer_note" rows="2" class="form-control"><?= esc($settings['booking_footer_note']) ?></textarea></div>
                        <div class="col-md-4"><label class="form-label">Location Title</label><input type="text" name="booking_location_title" class="form-control" value="<?= esc($settings['booking_location_title']) ?>"></div>
                        <div class="col-md-4"><label class="form-label">Address Label</label><input type="text" name="booking_address_label" class="form-control" value="<?= esc($settings['booking_address_label']) ?>"></div>
                        <div class="col-md-4"><label class="form-label">Email Label</label><input type="text" name="booking_email_label" class="form-control" value="<?= esc($settings['booking_email_label']) ?>"></div>
                        <div class="col-md-6"><label class="form-label">Hours Label</label><input type="text" name="booking_hours_label" class="form-control" value="<?= esc($settings['booking_hours_label']) ?>"></div>
                        <div class="col-md-6"><label class="form-label">Closed Label</label><input type="text" name="booking_closed_label" class="form-control" value="<?= esc($settings['booking_closed_label']) ?>"></div>
                        <div class="col-12"><label class="form-label">Google Map Embed URL</label><textarea name="booking_map_embed" rows="2" class="form-control"><?= esc($settings['booking_map_embed']) ?></textarea></div>
                        <div class="col-md-6"><label class="form-label">Reservation Slots JSON</label><textarea name="reservation_slots_json" rows="6" class="form-control"><?= esc($settings['reservation_slots_json']) ?></textarea></div>
                        <div class="col-md-6"><label class="form-label">Service Modes JSON</label><textarea name="service_modes_json" rows="6" class="form-control"><?= esc($settings['service_modes_json']) ?></textarea></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="accordion-item admin-card mb-3">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cartPage">Cart & Checkout Page</button>
            </h2>
            <div id="cartPage" class="accordion-collapse collapse" data-bs-parent="#settingsAccordion">
                <div class="accordion-body">
                    <div class="row g-4">
                        <div class="col-md-6"><label class="form-label">Banner Image</label><input type="text" name="cart_banner_image" class="form-control" value="<?= esc($settings['cart_banner_image']) ?>"></div>
                        <div class="col-md-6"><label class="form-label">Upload Banner Image</label><input type="file" name="cart_banner_image_file" class="form-control"></div>
                        <div class="col-md-4"><label class="form-label">Banner Subtitle</label><input type="text" name="cart_banner_subtitle" class="form-control" value="<?= esc($settings['cart_banner_subtitle']) ?>"></div>
                        <div class="col-md-8"><label class="form-label">Banner Title</label><input type="text" name="cart_banner_title" class="form-control" value="<?= esc($settings['cart_banner_title']) ?>"></div>
                        <div class="col-md-6"><label class="form-label">Cart Title</label><input type="text" name="cart_title" class="form-control" value="<?= esc($settings['cart_title']) ?>"></div>
                        <div class="col-md-6"><label class="form-label">Empty Cart Title</label><input type="text" name="cart_empty_title" class="form-control" value="<?= esc($settings['cart_empty_title']) ?>"></div>
                        <div class="col-md-6"><label class="form-label">Summary Subtitle</label><input type="text" name="cart_summary_subtitle" class="form-control" value="<?= esc($settings['cart_summary_subtitle']) ?>"></div>
                        <div class="col-md-6"><label class="form-label">Summary Title</label><input type="text" name="cart_summary_title" class="form-control" value="<?= esc($settings['cart_summary_title']) ?>"></div>
                        <div class="col-md-6"><label class="form-label">Items Label</label><input type="text" name="cart_items_label" class="form-control" value="<?= esc($settings['cart_items_label']) ?>"></div>
                        <div class="col-md-6"><label class="form-label">Subtotal Label</label><input type="text" name="cart_subtotal_label" class="form-control" value="<?= esc($settings['cart_subtotal_label']) ?>"></div>
                        <div class="col-md-6"><label class="form-label">Payment Heading</label><input type="text" name="checkout_payment_heading" class="form-control" value="<?= esc($settings['checkout_payment_heading']) ?>"></div>
                        <div class="col-md-6"><label class="form-label">Stripe Currency</label><input type="text" name="stripe_currency" class="form-control" value="<?= esc($settings['stripe_currency']) ?>"></div>
                        <div class="col-md-3"><label class="form-label">Cash Title</label><input type="text" name="checkout_cash_title" class="form-control" value="<?= esc($settings['checkout_cash_title']) ?>"></div>
                        <div class="col-md-3"><label class="form-label">Online Title</label><input type="text" name="checkout_online_title" class="form-control" value="<?= esc($settings['checkout_online_title']) ?>"></div>
                        <div class="col-md-6"><label class="form-label">Help Title</label><input type="text" name="cart_help_title" class="form-control" value="<?= esc($settings['cart_help_title']) ?>"></div>
                        <div class="col-md-6"><label class="form-label">Checkout Name Label</label><input type="text" name="cart_form_name_label" class="form-control" value="<?= esc($settings['cart_form_name_label']) ?>"></div>
                        <div class="col-md-6"><label class="form-label">Checkout Phone Label</label><input type="text" name="cart_form_phone_label" class="form-control" value="<?= esc($settings['cart_form_phone_label']) ?>"></div>
                        <div class="col-md-6"><label class="form-label">Checkout Email Label</label><input type="text" name="cart_form_email_label" class="form-control" value="<?= esc($settings['cart_form_email_label']) ?>"></div>
                        <div class="col-md-6"><label class="form-label">Notes Label</label><input type="text" name="cart_form_notes_label" class="form-control" value="<?= esc($settings['cart_form_notes_label']) ?>"></div>
                        <div class="col-md-6"><label class="form-label">Notes Placeholder</label><input type="text" name="cart_form_notes_placeholder" class="form-control" value="<?= esc($settings['cart_form_notes_placeholder']) ?>"></div>
                        <div class="col-md-6"><label class="form-label">Recommended Subtitle</label><input type="text" name="cart_recommended_subtitle" class="form-control" value="<?= esc($settings['cart_recommended_subtitle']) ?>"></div>
                        <div class="col-md-6"><label class="form-label">Recommended Heading</label><input type="text" name="cart_recommended_heading" class="form-control" value="<?= esc($settings['cart_recommended_heading']) ?>"></div>
                        <div class="col-12"><label class="form-label">Cart Intro</label><textarea name="cart_intro" rows="3" class="form-control"><?= esc($settings['cart_intro']) ?></textarea></div>
                        <div class="col-12"><label class="form-label">Empty Cart Text</label><textarea name="cart_empty_text" rows="3" class="form-control"><?= esc($settings['cart_empty_text']) ?></textarea></div>
                        <div class="col-md-6"><label class="form-label">Cash Description</label><textarea name="checkout_cash_text" rows="3" class="form-control"><?= esc($settings['checkout_cash_text']) ?></textarea></div>
                        <div class="col-md-6"><label class="form-label">Online Description</label><textarea name="checkout_online_text" rows="3" class="form-control"><?= esc($settings['checkout_online_text']) ?></textarea></div>
                        <div class="col-12"><label class="form-label">Online Unavailable Text</label><textarea name="checkout_online_unavailable_text" rows="2" class="form-control"><?= esc($settings['checkout_online_unavailable_text']) ?></textarea></div>
                        <div class="col-12"><label class="form-label">Summary Text</label><textarea name="cart_summary_text" rows="3" class="form-control"><?= esc($settings['cart_summary_text']) ?></textarea></div>
                        <div class="col-md-6"><label class="form-label">Success Title</label><input type="text" name="checkout_success_title" class="form-control" value="<?= esc($settings['checkout_success_title']) ?>"></div>
                        <div class="col-md-6"><label class="form-label">Cancel Title</label><input type="text" name="checkout_cancel_title" class="form-control" value="<?= esc($settings['checkout_cancel_title']) ?>"></div>
                        <div class="col-md-6"><label class="form-label">Back To Cart Label</label><input type="text" name="checkout_back_to_cart_label" class="form-control" value="<?= esc($settings['checkout_back_to_cart_label']) ?>"></div>
                        <div class="col-md-6"><label class="form-label">View Menu Label</label><input type="text" name="checkout_view_menu_label" class="form-control" value="<?= esc($settings['checkout_view_menu_label']) ?>"></div>
                        <div class="col-md-6"><label class="form-label">Success Text</label><textarea name="checkout_success_text" rows="3" class="form-control"><?= esc($settings['checkout_success_text']) ?></textarea></div>
                        <div class="col-md-6"><label class="form-label">Cancel Text</label><textarea name="checkout_cancel_text" rows="3" class="form-control"><?= esc($settings['checkout_cancel_text']) ?></textarea></div>
                        <div class="col-md-6"><label class="form-label">Stripe Publishable Key</label><input type="text" name="stripe_publishable_key" class="form-control" value="<?= esc($settings['stripe_publishable_key']) ?>"></div>
                        <div class="col-md-6"><label class="form-label">Stripe Secret Key</label><input type="text" name="stripe_secret_key" class="form-control" value="<?= esc($settings['stripe_secret_key']) ?>"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="accordion-item admin-card mb-4">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#productPage">Product Page & Strength JSON</button>
            </h2>
            <div id="productPage" class="accordion-collapse collapse" data-bs-parent="#settingsAccordion">
                <div class="accordion-body">
                    <div class="row g-4">
                        <div class="col-md-4"><label class="form-label">Product Rating Label</label><input type="text" name="product_rating_label" class="form-control" value="<?= esc($settings['product_rating_label']) ?>"></div>
                        <div class="col-md-4"><label class="form-label">Related Subtitle</label><input type="text" name="product_related_subtitle" class="form-control" value="<?= esc($settings['product_related_subtitle']) ?>"></div>
                        <div class="col-md-4"><label class="form-label">Related Heading</label><input type="text" name="product_related_heading" class="form-control" value="<?= esc($settings['product_related_heading']) ?>"></div>
                        <div class="col-12"><label class="form-label">Strengths JSON</label><textarea name="strengths_json" rows="8" class="form-control"><?= esc($settings['strengths_json']) ?></textarea></div>
                        <div class="col-12"><div class="form-text">Use valid JSON for homepage strengths cards.</div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-primary">Save Settings</button>
    </div>
</form>
<?= $this->endSection() ?>
