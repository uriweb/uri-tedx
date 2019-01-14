/**
 * Hero Player
 *
 * @package uri-tedx
 */

// Create this in the global scope so the YouTube API can call it locally.
var tedXURICreateTeaserVid;
function onYouTubePlayerAPIReady() {
	CLCreateYouTubePlayers();
	tedXURICreateTeaserVid();
}

( function() {

	window.addEventListener( 'load', loadYouTubeAPI, false );

	/*
	 * Load the API
	 */
	function loadYouTubeAPI() {

		var tag, firstScriptTag;

		tag = document.createElement( 'script' );
		tag.src = 'https://www.youtube.com/player_api';
		firstScriptTag = document.getElementsByTagName( 'script' )[0];
		firstScriptTag.parentNode.insertBefore( tag, firstScriptTag );

	}

	/*
	 * Create the player
	 */
	tedXURICreateTeaserVid = function() {

		var player;
		player = new YT.Player(
			'hero-player',
			{
				playerVars: {
					autoplay: 0,
					controls: 1,
					showinfo: 0,
					color: 'white',
					modestbranding: 1,
					iv_load_policy: 3
				},
				events: {
					'onReady': onTeaserReady
				}
			}
		);

	};

	/*
	 * Fire when player is ready
	 */
	function onTeaserReady( event ) {
		var button, tw, exit;

		tw = document.getElementById( 'hero-player-wrapper' );

		button = document.querySelector( '#hero-player-start a' );
		if ( null !== button ) {
			button.addEventListener( 'click', activateTeaser.bind( null, tw, event ) );
		}

		exit = document.getElementById( 'hero-player-exit' );
		exit.addEventListener(
			'click',
			function( e ) {
				e.stopPropagation();
				exitTeaser( tw, event );
			}
		);

	}

	/*
	 * Event handler for hero click
	 */
	function activateTeaser( tw, event ) {

		tw.classList.add( 'active' );
		event.target.playVideo();

	}

	/*
	 * Event handler for exit button click
	 */
	function exitTeaser( tw, event ) {

		tw.classList.remove( 'active' );
		event.target.pauseVideo();
		event.target.seekTo( 0 );

	}

})();
