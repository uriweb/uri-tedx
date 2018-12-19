/**
 * 2019 Speakers
 *
 * @package uri-tedx
 */

( function() {

	window.addEventListener( 'load', initSpeakers, false );

	function initSpeakers() {

		var els, el, block, i;

		els = document.querySelectorAll( '.block-slider-trigger' );

		for ( i = 0; i < els.length; i++ ) {

			block = els[i].parentElement.parentElement;
			block.addEventListener( 'click', handleSlider.bind( null, block, els[i] ), false );

		}

	}

	function handleSlider( block, trigger ) {

		var className = 'slider-open';

		if ( block.classList.contains( className ) ) {
			block.classList.remove( className );
			trigger.innerHTML = 'Read Synopsis';
		} else {
			block.classList.add( className );
			trigger.innerHTML = 'Close Synopsis';
		}

	}

})();
