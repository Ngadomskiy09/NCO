//array keeps all our sequence information
let arr = [];

//function that adds a new row to the table when the plus button is pushed
jQuery(document).delegate('a.add-record', 'click', function (e) {
    e.preventDefault();
    let content = jQuery('#sample_table tr'),
        size = jQuery('#tbl_posts >tbody >tr').length + 1,
        element = content.clone();
    element.attr('id', 'rec-' + size);
    element.find('.delete-record').attr('data-id', size);
    element.appendTo('#tbl_posts_body');
    element.find('.sn').html(size);
});

//function that deletes a row from the table when the trash can button is pushed
jQuery(document).delegate('a.delete-record', 'click', function (e) {
    e.preventDefault();
    var didConfirm = confirm("Are you sure You want to delete");
    if (didConfirm === true) {
        var id = jQuery(this).attr('data-id');
        var targetDiv = jQuery(this).attr('targetDiv');
        jQuery('#rec-' + id).remove();

        //regnerate index number on table
        $('#tbl_posts_body tr').each(function (index) {
            //alert(index);
            $(this).find('span.sn').html(index + 1);
        });
        return true;
    } else {
        return false;
    }
});


$('.opData').on('click',function(){
    $("#opInfo").html('');
    id = $(this).data('id');

    $.post('/getops',{
        id: id
    }).done(function(data){
        console.log(data);
        $('#opInfo').append(data);
        $('#opData').DataTable();
        $('#opData').removeClass("hidden");
    });
});

//adds an additional operator field when the plus button is pushed
/*$("#plus").on("click", function () {
    let $main = $("#ops");
    if (parseInt($main.children().last().attr("data-count")) < 5) {
        let $dupes = $main.children().last().clone();
        let count = parseInt($dupes.attr("data-count")) + 1;
        $dupes.attr("data-count", count);
        $dupes.find("#operator").attr("name", "operator"+ count);
        $dupes.find("#date2").attr("name", "date2"+ count);
        $dupes.find("#po").attr("name", "po"+ count);
        $dupes.find("#machine").attr("name", "machine"+ count);
        $dupes.find("#shift").attr("name", "shift"+ count);
        $dupes.find("#seq").attr("name", "seq"+ count);
        $main.last().append($dupes);
    }
});

// removes an operator field the minus button is pushed
$("#minus").on("click", function () {
    let $main = $("#ops");
    if (parseInt($main.children().last().attr("data-count")) !== 1) {
        $main.children().last().remove();
    }
});*/

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

function CheckReason(val) {
    var element = document.getElementById('reason');
    if (val == 'pick a reason' || val == 'SAT')
        element.style.display = 'block';
    else
        element.style.display = 'none';
}

function CheckNCPSR(val) {
    var element = document.getElementById('graphic');
    if (val == 'pick a graphic' || val == 'NCPSR')
        element.style.display = 'block';
    else
        element.style.display = 'none';
}

// hides the sequence block field
$(document).ready(function () {

});

// shows the sequence block field and adds additional block fields when add button is clicked
$("#addsequence").on("click", function () {
    let Fid = $(".all-sequences").data("formid");
    console.log(Fid);

    if ($(".all-sequences div").last().length === 0)
    {
        $.post("../seqblock", {
           value: 1,
            formID: Fid
        }).done(function(data){
            $(".all-sequences").append(data);
        })
    }
    else{
        let id = $(".all-sequences .block").last().data('id')+1;
        $.post("../seqblock", {
            value: id,
             formID: Fid
        }).done(function(data){
            $(".all-sequences").append(data);
        })
    }

});

// removes a sequence block field when the remove button is pushed
$("#removesequence").on("click", function () {
    let Fid = $(".all-sequences").data("formid");
    let id = $(".all-sequences .block").last().data('id');
    $.post('../deleteSeq',{
        value: id,
        formID: Fid
    });
    let lastSeq = $(".all-sequences .block").last();
    lastSeq.remove();
});

// save sequence information
$("body").on("blur", ".saveInfo", function () {
   let col = $(this).data("column");
   let org = $(this).data("input");
   let formId = $("#vip").data("vip");
   let seqId = $(this).parents(':eq(2)').data("id");

   if($(this).val().trim() !== ""){
       if(typeof arr[seqId] === 'undefined' ){
           arr[seqId] = [];
       }
       arr[seqId][org] =[formId, seqId, col, $(this).val()];
   }



});



$("#save").on("click",function(){
    console.log(arr);

    $.ajax({
        type: "POST",
        url: "/saveSeq",
        data: {stuff : arr}
    });
});