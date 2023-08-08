 <?php 
 $search_shortcode = get_field('newsroom_search_shortcode'); 
 $results_shortcode = get_field('newsroom_results_shortcode');?>
 <div class="degree-container">
<div class="bg"></div>
</div>
 <div class="newsroom-search-container">
    <div class="col-12">
        <?php echo do_shortcode($search_shortcode); ?>
    </div>

</div>

<div class="newsroom-results-container">
    <div class="col-12">
        <?php echo do_shortcode($results_shortcode); ?>
    </div>

</div>

