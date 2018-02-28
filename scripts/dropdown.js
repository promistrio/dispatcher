/**
 * Created by Владислав Буздин on 13.02.2018.
 */
var dropdownOptions = ["plane", "copter", "geoscan", "operator", "emulator"];

function deleteElement(text){
    for (var i = 0; i <= dropdownOptions.length - 1; i++){
        if (dropdownOptions[i] == text){
            dropdownOptions.splice(i, 1);
            break;
        }
    }
    return i;
}

$( '.dropdown-menu a' ).on( 'click', function( event ) {

    var $target = $( event.currentTarget ),
        val = $target.attr( 'data-value' ),
        $inp = $target.find( 'input' ),
        idx;

    if ( ( idx = dropdownOptions.indexOf( val ) ) <= -1 ) {
        dropdownOptions.push( val );
        setTimeout( function() { $inp.prop( 'checked', true ) }, 0);
    } else {
        console.log(deleteElement(val));
        setTimeout( function() { $inp.prop( 'checked', false ) }, 0);
    }

    $( event.target ).blur();

    console.log( dropdownOptions );
    return false;
});

