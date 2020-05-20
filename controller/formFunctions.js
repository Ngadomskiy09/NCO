
//function that adds a new row to the table when the plus button is pushed
jQuery(document).delegate('a.add-record', 'click', function(e) {
    e.preventDefault();
    let content = jQuery('#sample_table tr'),
        size = jQuery('#tbl_posts >tbody >tr').length + 1,
        element = content.clone();
    element.attr('id', 'rec-'+size);
    element.find('.delete-record').attr('data-id', size);
    element.appendTo('#tbl_posts_body');
    element.find('.sn').html(size);
});

//function that deletes a row from the table when the trash can button is pushed
jQuery(document).delegate('a.delete-record', 'click', function(e) {
    e.preventDefault();
    var didConfirm = confirm("Are you sure You want to delete");
    if (didConfirm === true) {
        var id = jQuery(this).attr('data-id');
        var targetDiv = jQuery(this).attr('targetDiv');
        jQuery('#rec-' + id).remove();

        //regnerate index number on table
        $('#tbl_posts_body tr').each(function(index) {
            //alert(index);
            $(this).find('span.sn').html(index+1);
        });
        return true;
    } else {
        return false;
    }
});

//adds an additional operator field when the plus button is pushed
$("#plus").on("click", function() {
    let $main = $("#ops");
    if( parseInt($main.children().last().attr("data-count")) < 5) {
        let $dupes = $main.children().last().clone();
        let count = parseInt($dupes.attr("data-count")) + 1;
        $dupes.attr("data-count", count);
        $main.last().append($dupes);
    }
});

// removes an operator field the minus button is pushed
$("#minus").on("click", function() {
    let $main = $("#ops");
    if( parseInt($main.children().last().attr("data-count")) !== 1){
        $main.children().last().remove();
    }
});

// the next four function copy inputs to other fields
$(function () {
    let $src = $("#program");
    let $dst = $("#list");
    $src.on('input', function () {
        $dst.val($src.val());
    });
});

$(function () {
    let $src1 = $("#media");
    let $dst1 = $("#list1");
    $src1.on('input', function () {
        $dst1.val($src1.val());
    });
});

$(function () {
    let $src1 = $("#fwc");
    let $dst1 = $("#list2");
    $src1.on('input', function () {
        $dst1.val($src1.val());
    });
});

$(function () {
    let $src1 = $("#date");
    let $dst1 = $("#list3");
    $src1.on('input', function () {
        $dst1.val($src1.val());
    });
});

// hides the sequence block field
$(document).ready(function() {
    $("#sequence-block").hide();
});

// shows the sequence block field and adds additional block fields when add button is clicked
$("#addsequence").on("click", function() {
    $("#sequence-block").show();

    $("#addsequence").on("click", function() {
        let $block = $("#sequence-block");
        let $duplicate = $block.children().last().clone();
        let count = parseInt($duplicate.attr("data-counts")) + 1;
        $duplicate.attr("data-counts", count);
        $block.last().append($duplicate);
    });
});

// removes a sequence block field when the remove button is pushed
$("#removesequence").on("click", function () {
    let $block = $("#sequence-block");
    if(parseInt($block.children().last().attr("data-counts")) !== 1)
    {
        $block.children().last().remove();
    }
});