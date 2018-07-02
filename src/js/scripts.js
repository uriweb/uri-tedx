/**
 * TEDxURI 2018 Scripts
 */


// Create this in the global scope so the YouTube API can call it locally.
var tedXURICreateTeaserVid;
function onYouTubePlayerAPIReady() {
	CLCreateYouTubePlayers();
	tedXURICreateTeaserVid();
}

(function(){

	window.addEventListener( 'load', loadYouTubeAPI, false );

	/*
	 * Load the API
	 */
	function loadYouTubeAPI() {

		// console.log('load api');
		var tag = document.createElement( 'script' );
		tag.src = "https://www.youtube.com/player_api";
		var firstScriptTag = document.getElementsByTagName( 'script' )[0];
		firstScriptTag.parentNode.insertBefore( tag, firstScriptTag );

		// console.log('load api - done');
	}

	/*
	 * Create the player
	 */
	tedXURICreateTeaserVid = function() {

		// console.log('create player');
		var player;
		player = new YT.Player(
			'teaser', {
			playerVars: {
					autoplay: 0,
					controls: 1,
					showinfo: 0,
					color: 'white',
					modestbranding: 1,
					iv_load_policy: 3
			},
			events: {
					'onReady' : onTeaserReady
			}
		}
			);

		// console.log('create player - done');
	};

	/*
	 * Fire when player is ready
	 */
	function onTeaserReady(event) {
		var button1, button2, tw, exit;

		// console.log('ready');
		tw = document.getElementById( 'teaser-wrapper' );

		button1 = document.querySelector( '#play-teaser span' );
		if ( button1 !== null) {
			button1.addEventListener( 'click', activateTeaser.bind( null,tw, event ) );
		}

		button2 = document.querySelector( '#play-yt a' );
		if ( button2 !== null) {
			button2.addEventListener( 'click', activateTeaser.bind( null,tw, event ) );
		}

		exit = document.getElementById( 'teaser-exit' );
		exit.addEventListener(
			'click', function(e){
			e.stopPropagation();
			exitTeaser( tw, event );
		}
			);

		// console.log('ready - done');
	}

	/*
	 * Event handler for hero click
	 */
	function activateTeaser(tw, event) {

		// console.log('activate');
		tw.classList.add( 'active' );
		event.target.playVideo();

		// console.log('activate - done');
	}

	/*
	 * Event handler for exit button click
	 */
	function exitTeaser(tw, event) {

		// console.log('exit');
		tw.classList.remove( 'active' );
		event.target.pauseVideo();
		event.target.seekTo( 0 );

		// console.log('exit - done');
	}

})();
