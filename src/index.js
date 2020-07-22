import './scss/style.scss';

/**
 * Extend Dice Roller to generate character stats.
 */

const blockClass = '.wp-block-group.character-generator';
const blocks = document.querySelectorAll( blockClass );

/**
 * Customize character generator blocks.
 *
 * @author R A Van Epps <rave@ravanepps.com>
 * @since  1.0.0
 *
 * @param  {Object} Block DOM element.
 */
blocks.forEach( ( block ) => {
	const buttons = block.querySelectorAll( 'button.roll-dice' );

	// Hide original buttons.
	if ( buttons.length > 0 ) {
		buttons.forEach( ( button ) => {
			button.style.display = 'none';
		} );
	}
} );
