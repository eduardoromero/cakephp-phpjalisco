<?php
    if(!isset($review_rating)) {
        $review_rating = 0;
    }
    if(!isset($review_rating_size)) {
        $review_rating_size = 'tiny';
    }
    if(!isset($review_rating_star)) {
        $review_rating_star = 'star';
    }
?>
<div class="ui <?php echo $review_rating_size ?> <?php echo $review_rating_star ?> rating review" data-max-rating="5" data-rating="<?php echo $review_rating ?>"></div>