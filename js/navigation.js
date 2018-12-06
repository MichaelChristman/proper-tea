/* global viewportSize */

/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */

//get viewport width
var vpWidth = viewportSize.getWidth();

var container, button, menu, links, subMenus, searchContainer, searchButton, searchMenu, moreFiltersButton, moreFilters, i, len;


/*
 * Assign Navigation Variables
 */
container = document.getElementById( 'site-navigation' );
//	if ( ! container ) {
//		return;
//	}

button = container.getElementsByTagName( 'button' )[0];
//	if ( 'undefined' === typeof button ) {
//		return;
//	}

// Hide menu toggle button if menu is empty and return early.
menu = container.getElementsByTagName('div')[0];

// Hide menu toggle button if menu is empty and return early.
//	if ( 'undefined' === typeof menu ) {
//		button.style.display = 'none';
//		return;
//	}

menu.setAttribute( 'aria-expanded', 'false' );

if ( -1 === menu.className.indexOf( 'nav-menu' ) ) {
        menu.className += ' nav-menu';
}

/*
 * Assign Search Menu Variables
 */
searchContainer = document.getElementById( 'site-navigation' );
//if ( !searchContainer ){
//    return;
//}

searchButton = searchContainer.getElementsByTagName('button')[1];
//if ( 'undefined' === typeof searchButton){
//    return;
//}

// Hide menu toggle button if menu is empty and return early.
searchMenu = searchContainer.getElementsByTagName('div')[1];
//if ( 'undefined' === typeof searchMenu ){
//    searchButton.style.display = 'none';
//    return;
//}

searchMenu.setAttribute( 'aria-expanded', 'false' );
if ( -1 === searchMenu.className.indexOf( 'prop-search-menu' ) ){
    searchMenu.className += ' prop-search-menu';
}

moreFiltersButton = searchContainer.querySelector('span.meta-nav');
moreFilters = searchContainer.querySelector('.more-filters-wrap');
//for(i=0; i < moreFilters.length ; i++){
//    moreFilters[i].className += ' bordello';
//}



( function( $ ) {
//	var container, button, menu, links, subMenus, searchContainer, searchButton, searchMenu, i, len;

        
        
	button.onclick = function() {
                /*
                 * If The menu button is clicked and has toggled class
                 */
		if ( -1 !== menu.className.indexOf( 'toggled' ) ) {
                        
                        //close it
			menu.className = menu.className.replace( ' toggled', '' );
//                        container.className =  container.className.replace( ' toggled', '' );
			button.setAttribute( 'aria-expanded', 'false' );
			menu.setAttribute( 'aria-expanded', 'false' );
                          
		} else {
                        
                        //open it
			menu.className += ' toggled';
//                        container.className += ' toggled';
			button.setAttribute( 'aria-expanded', 'true' );
			menu.setAttribute( 'aria-expanded', 'true' );
                        
                        /*
                         * If search is opened close it
                         */
                        if( -1 !== searchMenu.className.indexOf('toggled')){
//                            searchContainer.className = searchContainer.className.replace(' toggled','');
                            searchMenu.className = searchMenu.className.replace(' toggled','');
                            searchButton.setAttribute('aria-expanded', 'false');
                            searchMenu.setAttribute('aria-expanded', 'false');
                        }
		}
	};
        
        
       
        
        $(window).resize(function(){
            
            //update vpWidth variable
            vpWidth = viewportSize.getWidth();
            
            //if Viewport is above 799px
            if (vpWidth >= 800)  {
                
                //close menus
                
                /*
                 * If Nav is open close it
                 */
                if ( -1 !== menu.className.indexOf( 'toggled' ) ) {
                    
//                    container.className = container.className.replace( ' toggled', '' );
                    menu.className = menu.className.replace( ' toggled', '' );
                    button.setAttribute( 'aria-expanded', 'false' );
                    menu.setAttribute( 'aria-expanded', 'true' );
                          
		}
                
                /*
                 * If search is opened close it
                 */
                if( searchContainer !== null && -1 !== searchMenu.className.indexOf('toggled')){
                   
                    searchMenu.className = searchMenu.className.replace(' toggled','');
                    searchButton.setAttribute('aria-expanded', 'false');
                    searchMenu.setAttribute('aria-expanded', 'true');
                   
                }
                
            }else{
                menu.setAttribute( 'aria-expanded', 'false' );
                searchMenu.setAttribute('aria-expanded', 'false');
            }
                
        });
        
        

	// Get all the link elements within the menu.
	links    = menu.getElementsByTagName( 'a' );
	subMenus = menu.getElementsByTagName( 'ul' );

	// Set menu items with submenus to aria-haspopup="true".
	for ( i = 0, len = subMenus.length; i < len; i++ ) {
		subMenus[i].parentNode.setAttribute( 'aria-haspopup', 'true' );
	}

	// Each time a menu link is focused or blurred, toggle focus.
	for ( i = 0, len = links.length; i < len; i++ ) {
		links[i].addEventListener( 'focus', toggleFocus, true );
		links[i].addEventListener( 'blur', toggleFocus, true );
	}

	/**
	 * Sets or removes .focus class on an element.
	 */
	function toggleFocus() {
		var self = this;

		// Move up through the ancestors of the current link until we hit .nav-menu.
		while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

			// On li elements toggle the class .focus.
			if ( 'li' === self.tagName.toLowerCase() ) {
				if ( -1 !== self.className.indexOf( 'focus' ) ) {
					self.className = self.className.replace( ' focus', '' );
				} else {
					self.className += ' focus';
				}
			}

			self = self.parentElement;
		}
	}

	/**
	 * Toggles `focus` class to allow submenu access on tablets.
	 */
	( function( container ) {
		var touchStartFn, i,
			parentLink = container.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

		if ( 'ontouchstart' in window ) {
			touchStartFn = function( e ) {
				var menuItem = this.parentNode, i;

				if ( ! menuItem.classList.contains( 'focus' ) ) {
					e.preventDefault();
					for ( i = 0; i < menuItem.parentNode.children.length; ++i ) {
						if ( menuItem === menuItem.parentNode.children[i] ) {
							continue;
						}
						menuItem.parentNode.children[i].classList.remove( 'focus' );
					}
					menuItem.classList.add( 'focus' );
				} else {
					menuItem.classList.remove( 'focus' );
				}
			};

			for ( i = 0; i < parentLink.length; ++i ) {
				parentLink[i].addEventListener( 'touchstart', touchStartFn, false );
			}
		}
	}( container ) );
        
        function initMainNavigation( container ) {
		// Add dropdown toggle that display child menu items.
		container.find( '.menu-item-has-children > a, .page_item_has_children > a' ).after( '<button class="dropdown-toggle" aria-expanded="false">' + screenReaderText.expand + '</button>' );

		// Toggle buttons and submenu items with active children menu items.
		container.find( '.current-menu-ancestor > button' ).addClass( 'toggle-on' );
		container.find( '.current-menu-ancestor > .sub-menu' ).addClass( 'toggled-on' );

		container.find( '.dropdown-toggle' ).click( function( e ) {
			var _this = $( this );
			e.preventDefault();
			_this.toggleClass( 'toggle-on' );
			_this.next( '.children, .sub-menu' ).toggleClass( 'toggled-on' );
			_this.attr( 'aria-expanded', _this.attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
			_this.html( _this.html() === screenReaderText.expand ? screenReaderText.collapse : screenReaderText.expand );
		} );
	}
	initMainNavigation( $( '.main-navigation' ) );

	// Re-initialize the main navigation when it is updated, persisting any existing submenu expanded states.
	$( document ).on( 'customize-preview-menu-refreshed', function( e, params ) {
		if ( 'primary' === params.wpNavMenuArgs.theme_location ) {
			initMainNavigation( params.newContainer );

			// Re-sync expanded states from oldContainer.
			params.oldContainer.find( '.dropdown-toggle.toggle-on' ).each(function() {
				var containerId = $( this ).parent().prop( 'id' );
				$( params.newContainer ).find( '#' + containerId + ' > .dropdown-toggle' ).triggerHandler( 'click' );
			});
		}
	});
        
        
        //Hide/show toggle button on scroll
        

        
} )( jQuery );

( function( $ ) {
    
//    var  searchContainer, searchButton, searchMenu;
    

        
        searchButton.onclick = function(){
            //If the menu is toggled on
            if( -1 !== searchMenu.className.indexOf('toggled')){
                
                //close it
                searchMenu.className = searchMenu.className.replace(' toggled','');
//                searchContainer.className = searchContainer.className.replace(' toggled','');
                searchButton.setAttribute('aria-expanded', 'false');
                searchMenu.setAttribute('aria-expanded', 'false');
                
            }else{
                //open it
                searchMenu.className += ' toggled';
//                searchContainer.className += ' toggled';
                searchButton.setAttribute('aria-expanded', 'true');
                searchMenu.setAttribute('aria-expanded', 'true');
                
                /*
                 * If Nav is open close it
                 */
                if ( -1 !== menu.className.indexOf( 'toggled' ) ) {
                        
//                        container.className = container.className.replace( ' toggled', '' );
			menu.className = menu.className.replace( ' toggled', '' );
			button.setAttribute( 'aria-expanded', 'false' );
			menu.setAttribute( 'aria-expanded', 'false' );
                          
		}
                
                
            }
        };
        
//        var position, direction, previous;
//        
//        $(window).scroll(function(){
//            if( $(this).scrollTop() >= position ){
//                direction = 'down';
//                if( direction !== previous ){
//                    
//                    $('.search-toggle').addClass('hide');
//                    
//                    previous = direction;
//                }
//            }else {
//                direction = 'up';
//                if( direction !== previous ){
//                    
//                    $('.search-toggle').removeClass('hide');
//                    
//                    previous = direction;
//                }
//            }
//            position = $(this).scrollTop();
//        });
    
    
} )( jQuery );


( function( $ ) {
    
    moreFiltersButton.onclick = function() {
        //if more filters is open
        if( -1 !== moreFilters.className.indexOf('toggled')){
            //close it
            moreFilters.className = moreFilters.className.replace(' toggled','');
            moreFiltersButton.className = moreFiltersButton.className.replace(' toggled','');
            
        }else{
            //open it
            moreFilters.className += ' toggled';
            moreFiltersButton.className += ' toggled';
            
        }
            
        
    }
    
} )( jQuery );


( function( $ ) {
        var position, direction, previous;
        
        $(window).scroll(function(){
            if( $(this).scrollTop() >= position ){
                direction = 'down';
                if( direction !== previous ){
                    
                    $('#site-navigation').addClass('hide');
                    //$('.search-toggle').addClass('hide');
                    
                    previous = direction;
                }
            }else {
                direction = 'up';
                if( direction !== previous ){
                    
                    $('#site-navigation').removeClass('hide');
                    //.$('.search-toggle').removeClass('hide');
                    
                    
                    previous = direction;
                }
            }
            position = $(this).scrollTop();
        });
    
} )( jQuery );

