/**
 * List scripts
 *
 * These scripts are used for all views that list data. They are useful to
 * reuse the same logic accros multiple views
 */

// Checkall
$('#checkall').click(function(){
    checked = $(this).prop('checked');
    console.log('checked')
    // Set/unset all checkbox
    $('.checkbox-selection').prop('checked', checked);
});

/**
 * Get selected boxes
 * This method get all the the ids from the data-id attr in the tr
 */
function getIdsFromCheckedBoxes(){
    selected_boxes = $('.checkbox-selection:checked');
    ids=[];

    selected_boxes.each(function(index, element){
        ids[index] = $(element).closest('tr').data('id');
    });

    return ids;
}


