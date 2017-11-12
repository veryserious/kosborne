<header class="page-header large image-background text-light no-padding center" style="background-image: url('<?php the_post_thumbnail_url('full') ;?>')">
    <div class="mask opacity-5">
        <div class="container v-align-center">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="large"><?php the_title(); ?></h1>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- form-->
<section class="pt-large pb-large">
    <div class="container">

        <div class="col-md-12">
            <?php the_content(); ?>
        </div>
    </div>
</section>
<!-- / form -->