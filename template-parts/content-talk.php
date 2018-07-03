<?php
/**
 * Template part for displaying talks
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package uri-tedx
 */

?>

<?php if ( is_single() ) : ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->

		<div class="entry-content">

			<?php if ( get_field( 'ytid' ) ) { ?>
			<div class="theatre breakout">
				<iframe width="100%" height="500" src="https://www.youtube.com/embed/<?php the_field( 'ytid' ); ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
			</div>
			<?php } ?>

			<section>
				<div class="talk-info">
					<?php if ( get_field( 'name' ) ) { ?>
					<h1 class="talk-speaker">
						<?php
						the_field( 'name' );
						if ( get_field( 'event' ) ) {
						?>
						<span class="talk-event">at <?php the_field( 'event' ); ?></span>
						<?php } ?>
					</h1>
					<?php } ?>
					<?php if ( get_field( 'title' ) ) { ?>
					<h2 class="talk-title"><?php the_field( 'title' ); ?></h2>
					<?php } ?>
					<?php if ( get_field( 'description' ) ) { ?>
					<p class="talk-description"><?php the_field( 'description' ); ?></p>
					<?php } ?>
				</div>
				<div class="social-media-integration">
					<div class="smi-widget share-button share-twitter">
						<a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-size="large" data-hashtags="tedxuri" data-show-count="false">Tweet</a>
						<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
					</div>
					<div class="smi-widget share-button share-facebook"><iframe src="https://www.facebook.com/plugins/share_button.php?href=<?php echo urlencode( utf8_encode( get_permalink() ) ); ?>&layout=button&size=large&mobile_iframe=true&width=73&height=28&appId" width="73" height="28" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe></div>
					<div class="smi-widget yt-statistics">
					<?php

					/**
					 * Get the video data
					 */
					$key = 'AIzaSyC-6FV_g5x8dSIBNHW3kEh3VP8lu9qnb2c';
					$vid = get_field( 'ytid' );
					$json = file_get_contents( 'https://www.googleapis.com/youtube/v3/videos?part=statistics&id=' . $vid . '&key=' . $key );
					$json_data = json_decode( $json, true );

					$views = $json_data['items'][0]['statistics']['viewCount'];
					$likes = $json_data['items'][0]['statistics']['likeCount'];

					/* View Count */
					if ( $views ) {
						$view_label = 1 == $views ? 'view' : 'views';
						echo '<span class="yt-stat yt-views"><strong>' . number_format( $views ) . '</strong> ' . $view_label . '</span>';
					}

					/*
					 Like Count
					if ($likes || $likes == 0) {
						echo '<span class="yt-stat yt-likes" title="Likes on YouTube">' . number_format($likes) . '</span>';
					}
					*/

					?>
					</div>
				</div>
			</section>

			<section>
				<div class="about-this-speaker">
					<?php if ( get_the_post_thumbnail() ) { ?>
					<div class="headshot">
						<?php the_post_thumbnail( 'medium' ); ?>
					</div>
					<?php } ?>
					<div class="bio">
						<?php if ( get_field( 'name' ) ) { ?>
						<h1 class="bio-name"><?php the_field( 'name' ); ?></h1>
						<?php } ?>
						<?php if ( get_field( 'profession' ) ) { ?>
						<h2 class="bio-profession"><?php the_field( 'profession' ); ?></h2>
						<?php } ?>
						<?php if ( get_field( 'bio' ) ) { ?>
						<p class="bio-content"><?php the_field( 'bio' ); ?></p>
						<?php } ?>
					</div>
				</div>
			</section>

			<section>
			<?php if ( get_field( 'transcript' ) ) { ?>
				<div class="transcript">
					<h1>Transcript</h1>
					<?php the_field( 'transcript' ); ?>
				</div>
			<?php } ?>
			</section>

			<div class="next-promo breakout"><a href="https://www.uri.edu/tedx/watch/">Browse all our talks</a></div>

		</div><!-- .entry-content -->

		<?php if ( get_edit_post_link() ) : ?>
			<footer class="entry-footer">
				<?php
					edit_post_link(
						sprintf(
							/* translators: %s: Name of current post */
							esc_html__( 'Edit %s', 'uri-tedx' ),
							the_title( '<span class="screen-reader-text">"', '"</span>', false )
						),
						'<span class="edit-link">',
						'</span>'
					);
				?>
			</footer><!-- .entry-footer -->
		<?php endif; ?>
	</article><!-- #post-## -->

<?php else : ?>

	<div class="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<a class="cl-card talk-archive" href="<?php print get_the_permalink( $post ); ?>">

			<?php
			if ( get_the_post_thumbnail() ) {
				the_post_thumbnail( $post->ID, 'medium' );
			};
			?>

			<div class="cl-card-text">

				<div class="talk-speaker">
					<?php
					the_field( 'name' );
					if ( get_field( 'event' ) ) {
					?>
					<div class="talk-event"><?php the_field( 'event' ); ?></div>
					<?php } ?>
				</div>

				<?php if ( get_field( 'title' ) ) { ?>
				<h3 class="talk-title"><?php the_field( 'title' ); ?></h3>
				<?php } ?>

			</div>

		</a>

	</div>
	
<?php endif; ?>
