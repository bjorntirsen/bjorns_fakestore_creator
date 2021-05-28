<!-- Women's clothing Section -->
<section class="page-section bg-primary mb-0" id="womensclothing">
            <div class="container">
                <!-- Women's clothing Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-white">LEGO Creator</h2>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Women's clothing Section Content-->
                <div class="text-black row d-flex justify-content-center">
                    <?php App::renderProductCards($grouped_array['creator']); ?>
                </div>
            </div>
        </section>
        <!-- Men's clothing Section -->
        <section class="page-section" id="mensclothing">
            <div class="container">
                <!-- Men's clothing Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">LEGO Technic</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Men's clothing Section Content-->
                <div class="text-black row d-flex justify-content-center">
                    <?php App::renderProductCards($grouped_array['technic']); ?>
                </div>
            </div>
        </section>
        <!-- Jewelery Section -->
        <section class="page-section jewelery-section" id="jewelery">
            <div class="container">
                <!-- Jewelery Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-white">LEGO Mindstorms</h2>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Jewelery Section Content-->
                <div class="text-black row d-flex justify-content-center">
                    <?php App::renderProductCards($grouped_array['mindstorms']); ?>
                </div>
            </div>
        </section>