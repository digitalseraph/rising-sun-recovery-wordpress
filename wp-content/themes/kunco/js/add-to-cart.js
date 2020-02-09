jQuery( function( $ ) {
   "use strict";
   if ( typeof wc_add_to_cart_params === 'undefined' ) {
      return false;
   }

   $( document ).on( 'click', '.add_to_cart_button', function() {

      var $thisbutton = $( this );

      if ( $thisbutton.is( '.product_type_simple' ) ) {

         if ( ! $thisbutton.attr( 'data-product_id' ) ) {
            return true;
         }

         $thisbutton.removeClass( 'added' );
         $thisbutton.addClass( 'loading' );

         var data = {};

         $.each( $thisbutton.data(), function( key, value ) {
            data[key] = value;
         });

         $( document.body ).trigger( 'adding_to_cart', [ $thisbutton, data ] );

         $.post( wc_add_to_cart_params.wc_ajax_url.toString().replace( '%%endpoint%%', 'add_to_cart' ), data, function( response ) {

            if ( ! response ) {
               return;
            }

            var this_page = window.location.toString();

            this_page = this_page.replace( 'add-to-cart', 'added-to-cart' );

            if ( response.error && response.product_url ) {
               window.location = response.product_url;
               return;
            }

            if ( wc_add_to_cart_params.cart_redirect_after_add === 'yes' ) {

               window.location = wc_add_to_cart_params.cart_url;
               return;

            } else {

               $thisbutton.removeClass( 'loading' );

               var fragments = response.fragments;
               var cart_hash = response.cart_hash;

               if ( fragments ) {
                  $.each( fragments, function( key ) {
                     $( key ).addClass( 'updating' );
                  });
               }

               $( '.shop_table.cart, .updating, .cart_totals' ).fadeTo( '400', '0.6' ).block({
                  message: null,
                  overlayCSS: {
                     opacity: 0.6
                  }
               });

               $thisbutton.addClass( 'added' );

               //Custom by gavias
               setTimeout(function(){
                  $('.mini-cart-header .dropdown').addClass('open');
               }, 1000);    

               if ( ! wc_add_to_cart_params.is_cart && $thisbutton.parent().find( '.added_to_cart' ).size() === 0 ) {
                  $thisbutton.after( ' <a href="' + wc_add_to_cart_params.cart_url + '" class="added_to_cart wc-forward" title="' +
                     wc_add_to_cart_params.i18n_view_cart + '">' + wc_add_to_cart_params.i18n_view_cart + '</a>' );
               }

               if ( fragments ) {
                  $.each( fragments, function( key, value ) {
                     $( key ).replaceWith( value );
                  });
               }

               $( '.widget_shopping_cart, .updating' ).stop( true ).css( 'opacity', '1' ).unblock();

               $( '.shop_table.cart' ).load( this_page + ' .shop_table.cart:eq(0) > *', function() {

                  $( '.shop_table.cart' ).stop( true ).css( 'opacity', '1' ).unblock();
                  
                  $( document.body ).trigger( 'cart_page_refreshed' );
               });

               $( '.cart_totals' ).load( this_page + ' .cart_totals:eq(0) > *', function() {
                  $( '.cart_totals' ).stop( true ).css( 'opacity', '1' ).unblock();
               });

               $( document.body ).trigger( 'added_to_cart', [ fragments, cart_hash, $thisbutton ] );

            }
         });

         return false;
      }
      return true;
   });

});
