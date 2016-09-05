<?php
$args = array(
	'post_type'     => 'evenements',
	'category_name'=> 'agenda',
	'post_per_page' => 1,
	"meta_key" => "_sortdate",
	"orderby" => "meta_value",
	"order" => "ASC"
);


$agenda = new WP_Query( $args );

if ( $agenda->have_posts()) :
?>

 <div id="volet" id="primary-sidebar" class= "text-primary background-secondary">
		     <ul id="agenda">
			    <li><h1 class="heavy">AGENDA:</h1></li>
       <?php while ($agenda->have_posts() ) : $agenda->the_post(); ?>
<a href="<?php echo get_permalink(); ?>">
    <li><h3 class="bold"><?php echo get_post_meta($post->ID, '_date', true ); ?></h3>
		    <span class="bold"><?php the_title( ); ?><br><?php the_excerpt(); ?></span></li>
</a>
   <?php endwhile; ?>

     <a href="#volet" class="ouvrir bold text-primary "><i class="fa fa-chevron-down fa-1x firstarrow" aria-hidden="true"></i>INFOS/AGENDA<i class="fa fa-chevron-down fa-1x scndarrow" aria-hidden="true"></i></a>
			     <a href="#volet_clos" class="fermer bold text-primary "><i class="fa fa-chevron-up fa-1x firstarrow" aria-hidden="true"></i>INFOS/AGENDA<i class="fa fa-chevron-up fa-1x scndarrow" aria-hidden="true"></i></a>
		     </ul>
	     </div>




 <?php endif; ?>







<!-- <div id="volet" id="primary-sidebar" class= "text-primary background-secondary">
                     <ul id="agenda">
                            <li><h1 class="heavy">AGENDA:</h1>
                             <li><h3 class="bold">Mercredi 7 sept</h3>
                             <p class="bold">LANCEMENT DES MERCREDIS<br>1er marché couvert</p></li>
                             <li><h3 class="bold">Jeudi 15 sept</h3>
                             <p class="bold">SORIF - CONCERT<br>Musique du Monde</p></li>
                             <li><h3 class="bold">16 sept > 30 oct</h3>
                             <p class="bold">NÉS QUELQUE PART<br>avec l’Agence Française de <br>
                                                 Développement</p></li>
                             <li><h3 class="bold">Sam 17 et dim 18 sept</h3>
                             <p class="bold">WEEK-END D’OUVERTURE :<br>PATRIMOINE ET CRÉATION</p>
                             <li><h3 class="bold">17 sept > 19 nov</h3>
                             <p class="bold">INVITATIONS D’ARTISTES<br>à l’Espace Croisé</p></li>
                             <li><h3 class="bold">Jeudi 22 sept</h3>
                             <p class="bold">Entreprendre pour la culture<br>Journée PRO</p></li>
                             <li><h3 class="bold">Ven 23 et Sam 24 sept</h3>
                             <p class="bold">CROSSROADS Festival<br></p></li>
                             <li><h3 class="bold">Sam 1er oct</h3>
                             <p class="bold">RIEN NE CHUTE GroupeA<br>Mikko Umi - Fresque</p></li>
                                         <a href="#volet" class="ouvrir bold text-primary background-secondary"><i class="fa fa-chevron-down fa-1x firstarrow" aria-hidden="true"></i>INFOS/AGENDA<i class="fa fa-chevron-down fa-1x scndarrow" aria-hidden="true"></i></a>
                             <a href="#volet_clos" class="fermer bold text-primary background-secondary"><i class="fa fa-chevron-up fa-1x firstarrow" aria-hidden="true"></i>INFOS/AGENDA<i class="fa fa-chevron-up fa-1x scndarrow" aria-hidden="true"></i></a>
                     </div>
             </div> -->
