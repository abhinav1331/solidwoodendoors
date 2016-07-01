<?php 
/*
* Template Name: Home page Template
*/
get_header();
?>
        <section class="banner wow fadeInDown">
            <div id="home-banner" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    <div class="item active banner-image" style="background-image: url('<?php echo esc_url( get_template_directory_uri() ); ?>/images/home-banner1.jpg');"></div>
                    <div class="item banner-image" style="background-image: url('<?php echo esc_url( get_template_directory_uri() ); ?>/images/home-banner2.jpg');"></div>
                    <div class="item banner-image" style="background-image: url('<?php echo esc_url( get_template_directory_uri() ); ?>/images/home-banner3.jpg');"></div>
                </div>
            </div>
            <div class="home-text">
                <div class="home-text-inner">
                    <h1>Welcome to SolidWoodenDoors</h1>
                    <p>Browse through our range of high end bespoke internal wooden doors and external solid wooden doors, we have designs for all tastes and budgets. Our Solid core doors with veneer doors come in many different veneers and stained finishes. All doors can be ordered as leafs or pre hung door sets. Our range comes in most standard sizes and includes fire doors and many glazing options. We can also manufacture bespoke doors sizes upto2.4m tall and 1.2m wide. Some doors are available up to 2.7M. For all door handles and ironmongery requirements visit our sister site: swd-ironmongery.com You can order a full colour brochure or Digital PDF for FREE</p>
                    <p>Bespoke Designs</p>
                    <p>We can manufacture almost any design you have with our range of custom joineries in Spain, and the UK. We can create wood doors in almost any wood veneer with a large range of finishes from unfinished solid woods to stained veneers. One of our best finishes is the high gloss polyester finish which gives a piano like finish to the wood. We have carried out designs for some of the top interior designers and property developers in the country. If you would like to discuss our specialist services please call us or email: sales@solidwoodendoors.com</p>
                </div>
                <a class="home-text-btn" href="javascript:void(0)"><i class="fa fa-caret-right" aria-hidden="true"></i><i class="fa fa-caret-left" aria-hidden="true"></i></a>
            </div>
        </section>
        <section class="home-4boxs wow fadeInDown">
            <div class="home-4box">
                <a href="#">
                    <figure><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/home-img1.jpg" alt="" title=""></figure>
                    <div class="overlay">
                        <div class="display-table">
                            <div class="display-table-cell">
                                <div class="text">
                                    <h6>Internal</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="home-4box">
                <a href="#">
                    <figure><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/home-img2.jpg" alt="" title=""></figure>
                    <div class="overlay">
                        <div class="display-table">
                            <div class="display-table-cell">
                                <div class="text">
                                    <h6>External</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="home-4box">
                <a href="#">
                    <figure><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/home-img3.jpg" alt="" title=""></figure>
                    <div class="overlay">
                        <div class="display-table">
                            <div class="display-table-cell">
                                <div class="text">
                                    <h6>Ironmongery</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="home-4box">
                <a href="#">
                    <figure><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/home-img4.jpg" alt="" title=""></figure>
                    <div class="overlay">
                        <div class="display-table">
                            <div class="display-table-cell">
                                <div class="text">
                                    <h6>Portfolio</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </section>
<?php
get_footer(); 
?>