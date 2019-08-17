<?php 
  /** Template Name: Homepage */

  get_header();
?>

<section id="hero">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="hero-title">
               Вашата омилена е-продавница за книги
                </h1>
                <h3 class="hero-subtitle">Читај повеќе, <br>добивај повеќе! </h3>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="h2 my-5">Најнови книги</h2>
            </div>
            <hr/>
            <div class="col-12">

                <?php echo do_shortcode('[products limit="8" columns="4" orderby="id" order="DESC" visibility="visible" category="drama, historical, mystery, romance, thriller, chick-lit"]');
?>
           
            
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
?>