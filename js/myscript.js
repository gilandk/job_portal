$(function() {

    var url = window.location;

    // for sidebar menu entirely but not cover treeview
    $('ul.sidebar-menu a').filter(function() {
        return this.href == url;
    }).parent().siblings().removeClass('active').end().addClass('active');

    // for treeview
    $('ul.treeview-menu a').filter(function() {
        return this.href == url;
    }).parentsUntil(".sidebar-menu > .treeview-menu").siblings().removeClass('active').end().addClass('active');

});


//confirmation when click
$('.confirmation').on('click', function() {
    var confirmation = confirm('Are you sure to delete this RECORD');
    if (confirmation) {
        return true;
    }
    return false;
});

//end


//confirm adding acc
$('.confirmacc').on('click', function() {
    var confirmation = confirm('Create LOGIN ACCOUNT?');
    if (confirmation) {
        return true;
    }
    return false;
});

//Table
$(document).ready(function() {
    $('#mailbox').DataTable({
        "order": [
            [2, "desc"]
        ]
    });
});

function validatePhone(event) {

    //event.keycode will return unicode for characters and numbers like a, b, c, 5 etc.
    //event.which will return key for mouse events and other events like ctrl alt etc. 
    var key = window.event ? event.keyCode : event.which;

    if (event.keyCode == 8 || event.keyCode == 46 || event.keyCode == 37 || event.keyCode == 39) {
        // 8 means Backspace
        //46 means Delete
        // 37 means left arrow
        // 39 means right arrow
        return true;
    } else if (key < 48 || key > 57) {
        // 48-57 is 0-9 numbers on your keyboard.
        return false;
    } else return true;
}

//dob
$('#dob').on('change', function() {
    var today = new Date();
    var birthDate = new Date($(this).val());
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();

    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }

    $('#age').val(age);
});

//password
$("#registerCandidates").on("submit", function(e) {
    e.preventDefault();
    if ($('#password').val() != $('#cpassword').val()) {
        $('#passwordError').show();
    } else {
        $(this).unbind('submit').submit();
    }
});

//changepassword
$("#changePassword").on("submit", function(e) {
    e.preventDefault();
    if ($('#password').val() != $('#cpassword').val()) {
        $('#passwordError').show();
    } else {
        $(this).unbind('submit').submit();
    }
});

$(function() {
    $('#myjobpost').DataTable({
        'order': [2, "desc"],
        'paging': true,
        'lengthChange': true,
        'searching': true,
        'ordering': true,
        'info': true,
        'autoWidth': false
    });
});

$(function() {
    $('#resumedb').DataTable({
        'paging': true,
        'lengthChange': true,
        'searching': true,
        'ordering': true,
        'info': true,
        'autoWidth': false
    });
});

$(function() {
    $('#activejobs').DataTable({
        'order': [3, "asc"],
        'paging': true,
        'lengthChange': true,
        'searching': true,
        'ordering': true,
        'info': true,
        'autoWidth': false
    });
});

$(function() {
    $('#messages').DataTable({
        'order': [0, "desc"],
        'paging': true,
        'lengthChange': true,
        'searching': true,
        'ordering': true,
        'info': true,
        'autoWidth': false
    });
});


$(function() {
    $('#applications').DataTable({
        'paging': true,
        'lengthChange': true,
        'searching': true,
        'ordering': true,
        'info': true,
        'autoWidth': false
    });
});

$(function() {
    $('#companies').DataTable({
        'paging': true,
        'lengthChange': true,
        'searching': true,
        'ordering': true,
        'info': true,
        'autoWidth': false
    });
});