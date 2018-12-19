/**
 * 2019 Speakers
 *
 * @package uri-tedx
 */

( function() {

	window.addEventListener( 'load', initSpeakers, false );

	function initSpeakers() {

		var els, el, block, parent, i;

		els = document.querySelectorAll( '.block-slider-trigger' );

		for ( i = 0; i < els.length; i++ ) {

			parent = els[i].parentElement;
			block = parent.parentElement;
			block.addEventListener( 'click', handleSlider.bind( null, parent, els[i] ), false );

		}

	}

	function handleSlider( parent, trigger ) {

		var className = 'slider-open';
		console.log( 'clicked' );

		if ( parent.classList.contains( className ) ) {
			parent.classList.remove( className );
			trigger.innerHTML = 'Read Synopsis';
		} else {
			parent.classList.add( className );
			trigger.innerHTML = 'Close Synopsis';
		}

	}

})();
