<?php 
/**
 * Portfolio: Single Content Retusz
 *
 * @package WordPress
 * @subpackage Portfolio
 * 
 */

 $beforeID = get_field('przed');
 $afterID = get_field('po');

?>

<section class="compare">
    <div class="compare__container">
        <img class="" <?php awesome_acf_responsive_image( $beforeID, 'thumb-640', '1200px' ); ?> alt="<?php echo $image['alt']; ?>" />
        <img class="" <?php awesome_acf_responsive_image( $afterID, 'thumb-640', '1200px' ); ?> alt="<?php echo $image['alt']; ?>" />			
    </div>
</section>