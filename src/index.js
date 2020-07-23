import './scss/style.scss';

const {
	i18n: {
		__,
	},
} = wp;

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

	const rollers = block.querySelectorAll( '.wp-block-rave-dice-roller' );

	// Add custom button.
	const newButton = document.createElement( 'button' );

	// Set attributes and text.
	newButton.setAttribute( 'class', 'roll-all-dice' );
	newButton.setAttribute( 'type', 'button' );
	newButton.innerHTML = __( 'Roll Dice', 'character-generator' );

	const innerBlock = block.querySelector( '.wp-block-group__inner-container' );

	// Place button at top of block group.
	innerBlock.insertBefore( newButton, innerBlock.firstChild );
} );
