//load_items_to_table();
load_categories();
get_item_code();

$('#file').change(function (event) {
    //get the path of the selected image
    var tmppath = URL.createObjectURL(event.target.files[0]);
    //set the path to the src attribute
    $("#image").attr('src', tmppath);
    //get the uploaded image name with the extension
    var img_name = event.target.files[0].name;
    //split the name
    var x = img_name.split('.');
    if (x[1] == "jpg" || x[1] == "jpeg" || x[1] == "png") {
        //concat . & image extension to item code 
        var new_name = $('#item_code').val() + '.' + x[1];
        localStorage.setItem('new_name', new_name);
        $('#img_msg').addClass('d-none');
        $('#save_item').prop('disabled', false);
    } else {
        $('#img_msg').removeClass('d-none');
        $('#save_item').prop('disabled', true);
    }
});

$('#save_item').click(function () {
    upload_img();
});

$('#update_item').click(function () {
    upload_updated_img();
    $('#save_item').removeClass('d-none');
    $('#update_item').addClass('d-none');
//    update_items();
});

$('#reset_item').click(function () {
    clear_items();
});

$('#item_search').keyup(function () {
    load_items_to_table();
});

$('#item_cat').change(function () {
    load_sizes();
    load_fabrics();
});

$('#fabric_type').change(function () {
    load_designs();
});

$('#size').change(function () {
    create_item_name();
});

$('#design_type').change(function () {
    create_item_name();
});

$('#color').keyup(function () {
    create_item_name();
});

$('#item_keep').keyup(function () {
    validate_item_keep();
});

//==============================================================================

function validate_item_keep() {
    var item_keep = $('#item_keep').val();
    var old_item_keep = new RegExp('^[1-6][0-6]{0}$');
    if (old_item_keep.test(item_keep)) {
        $('#item_keep_valid_msg').addClass('d-none');
        $('#save_item').prop("disabled", false);
    } else {
        $('#item_keep_valid_msg').removeClass('d-none');
        $('#save_item').prop("disabled", true);
    }
}

function item_form_validate() {
    var error = 0;

    var item_cat = $('#item_cat').val();
    var item_color = $('#color').val();
    var item_keep = $('#item_keep').val();
    var item_rent_cost = $('#item_rent_cost').val();

    if (document.getElementById("file").files.length == 0) {
        $('#item_photo_msg').removeClass('d-none');
    } else {
        $('#item_photo_msg').addClass('d-none');
    }

    if (item_cat == 0) {
        $('#item_cat_msg').removeClass('d-none');
        error += 1;
    } else {
        $('#item_cat_msg').addClass('d-none');
    }
    if (item_color.length == 0) {
        $('#item_color_msg').removeClass('d-none');
        error += 1;
    } else {
        $('#item_color_msg').addClass('d-none');
    }

    if (item_keep.length == 0) {
        $('#item_keep_msg').removeClass('d-none');
        error += 1;
    } else {
        $('#item_keep_msg').addClass('d-none');
    }

    if (item_rent_cost.length == 0) {
        $('#item_rent_msg').removeClass('d-none');
        error += 1;
    } else {
        $('#item_rent_msg').addClass('d-none');
    }

    if (error > 0) {
        return false;
    } else {
        return true;
    }
}

//move the image to its distination
function upload_img() {
    if (document.getElementById("file").files.length == 0) {
        $('#item_photo_check').removeClass('d-none');
    } else {
        $('#item_photo_check').addClass('d-none');
        //create a inbuilt object 
        var fd = new FormData();
        //assign the image details(name, extension, size..) to a variable
        var files = $('#file')[0].files[0];
        //append the uploaded image details to the object fd 
        fd.append('file', files);
        $.ajax({
            url: './models/img_upload.php',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response != 0) {
                    get_item_to_save();
                } else {
                    alertify.error('Image not uploaded');
                }
            },
        });
    }
}

function upload_updated_img() {
    $('#item_photo_check').addClass('d-none');
    var fd = new FormData();
    var files = $('#file')[0].files[0];
    fd.append('file', files);
    $.ajax({
        url: './models/img_upload.php',
        type: 'post',
        data: fd,
        contentType: false,
        processData: false,
        success: function (response) {
            if (response != 0) {
                update_items();
            } else {
                alertify.error('Image not uploaded');
            }
        },
    });
}

function clear_items() {
    $('#item_code').val('');
    $('#item_cat').val('');
    $('#fabric_type').val('');
    $('#design_type').val('');
    $('#color').val('');
    $('#size').val('');
    $('#item_name').val('');
    $('#item_keep').val('');
    $('#item_photo').val('');
    $('#item_rent_cost').val('');
    $('#item_gender').val('');
    $("img").attr('src', '');
}

function get_item_to_save() {
    var item_code = $('#item_code').val();
    var item_cat = $('#item_cat').val();
    var item_gender = $('#item_gender').val();
    var item_size = $('#size').val();
    var item_fabric = $('#fabric_type').val();
    var item_design = $('#design_type').val();
    var item_color = $('#color').val();
    var item_name = $('#item_name').val();
    var item_keep = $('#item_keep').val();
    //to make uploaded image name = saved database image
    var item_photo = localStorage.getItem('new_name');
    var item_rent_cost = $('#item_rent_cost').val();

    var dataArray = {action: "get_item_to_save", item_code: item_code, item_cat: item_cat, item_gender: item_gender, item_size: item_size, item_fabric: item_fabric, item_design: item_design, item_color: item_color, item_name: item_name, item_keep: item_keep, item_photo: item_photo, item_rent_cost: item_rent_cost}

    if (item_form_validate()) {
        $.post("./models/item_register_model.php", dataArray, function (reply) {
            if (reply == 1) {
//            alert('Insert Query Ok');
                alertify.success('Item Added Successfully');
                load_items_to_table();
                clear_items();
                get_item_code();
            } else {
//            alert('Insert Query not Ok');
                alertify.error('Item Added Failed');
            }
        });
    }
}

function load_items_to_table() {
    var tbl_data = "";
    var search = $('#item_search').val();
    var dataArray = {action: "load_items_to_table", search: search}
    $.post("./models/item_register_model.php", dataArray, function (reply) {
        $.each(reply, function (index, value) {
            tbl_data += '<tr>';
            tbl_data += '<td>' + value.item_code + '</td>';
            tbl_data += '<td>' + value.item_name + '</td>';
            tbl_data += '<td><button type="button" class="btn btn-primary select" style="margin-right:5px;" value="' + value.item_id + '"><i class="fas fa-hand-pointer" style="color: black"></i></button><button type="button" class="btn btn-danger delete" value="' + value.item_id + '"><i class="fas fa-trash" style="color: black"></i></button></td>';
            tbl_data += '</tr>';
        });
        $('#item_regi_table tbody').html('').append(tbl_data);

        $('.select').click(function () {
            select_items_to_update($(this).val());
            $('#save_item').addClass('d-none');
            $('#update_item').removeClass('d-none');
        });

        $('.delete').click(function () {
            var item_id = $(this).val();

            alertify.confirm("Confirm Delete !", "Are you sure you want to delete this item ?",
                    function () {
                        delete_item(item_id);
                    },
                    function () {
                        alertify.error('Delete Canceled');
                    });
        });

//        $('.delete').click(function () {
//            delete_item($(this).val());
//        });
    }, 'json');
}

function select_items_to_update(item_id) {
    var dataArray = {action: "select_items_to_update", item_id: item_id}
    $.post("./models/item_register_model.php", dataArray, function (reply) {
        $.each(reply, function (index, value) {
            $('#item_code').val(value.item_code);
            load_categories(value.item_category);
            setTimeout(function () {
                load_sizes(value.size);
            }, 200);
            setTimeout(function () {
                load_fabrics(value.fabric_type);
            }, 300);
            setTimeout(function () {
                load_designs(value.design_type);
            }, 400);
            $('#color').val(value.color);
            $('#item_gender').val(value.gender_type);
            $('#item_name').val(value.item_name);
            $('#item_keep').val(value.item_keep_days);
            $('#image').attr('src', './others/uploads/' + value.photo);
            $('#item_rent_cost').val(value.item_rent_price);
            localStorage.setItem('item', item_id);
            localStorage.setItem('new_name', value.photo);
        });
    }, 'json');
}

function update_items() {
    var item_code = $('#item_code').val();
    var item_cat = $('#item_cat').val();
    var item_gender = $('#item_gender').val();
    var item_fabric = $('#fabric_type').val();
    var item_design = $('#design_type').val();
    var item_color = $('#color').val();
    var item_size = $('#size').val();
    var item_name = $('#item_name').val();
    var item_keep = $('#item_keep').val();
    var item_photo = localStorage.getItem('new_name');
    var item_rent_cost = $('#item_rent_cost').val();
    var item_id = localStorage.getItem('item');

    var dataArray = {action: "update_items", item_code: item_code, item_cat: item_cat, item_gender: item_gender, item_fabric: item_fabric, item_design: item_design, item_color: item_color, item_size: item_size, item_name: item_name, item_keep: item_keep, item_photo: item_photo, item_id: item_id, item_rent_cost: item_rent_cost}
    $.post("./models/item_register_model.php", dataArray, function (reply) {
        if (reply == 1) {
//            alert('Update Query Ok');
            alertify.warning('Item Updated Successfully');
            load_items_to_table();
            clear_items();
        } else {
//            alert('Update Failed');
            alertify.error('Item Update Failed');

        }
    });
}


function delete_item(item_id) {
    var dataArray = {action: "delete_item", item_id: item_id}
    $.post("./models/item_register_model.php", dataArray, function (reply) {
        if (reply == 1) {
//            alert('delete ok');
            alertify.success('Item Deleted Successfully');
            load_items_to_table();
            clear_items;
        } else {
//            alert('delete not ok');
            alertify.error('Item Delete Failed');
        }
    });
}

//function delete_item(item_id) {
//    var dataArray = {action: "delete_item", item_id: item_id}
//    $.post("./models/item_register_model.php", dataArray, function (reply) {
//        if (reply == 1) {
////            alert('delete ok');
//            alertify.success('Item Deleted Successfully');
//            load_items_to_table();
//            clear_items;
//        } else {
////            alert('delete not ok');
//            alertify.error('Item Delete Failed');
//        }
//    });
//}

function load_categories(select) {
    var data;
    var dataArray = {action: "load_categories"}
    $.post("./models/item_register_model.php", dataArray, function (reply) {
        data += '<option value="0">Please select a Item Category</option>';
        $.each(reply, function (index, value) {
            if (select == value.cat_id) {
                data += '<option value="' + value.cat_id + '" selected="">' + value.cat_name + '</option>';
            } else {
                data += '<option value="' + value.cat_id + '">' + value.cat_name + '</option>';
            }
        });
        $('#item_cat').html('').append(data);
    }, 'json');
}

function load_sizes(select) {
    var data;
    var cat_id = $('#item_cat').val();
    var dataArray = {action: "load_sizes", cat_id: cat_id}
    $.post("./models/item_register_model.php", dataArray, function (reply) {
        $.each(reply, function (index, value) {
            if (select == value.size_id) {
                data += '<option value="' + value.size_id + '" selected="">' + value.size + '</option>';
            } else {
                data += '<option value="' + value.size_id + '">' + value.size + '</option>';
            }
        });
        $('#size').html('').append(data);
        create_item_name();
    }, 'json');
}

function load_fabrics(select) {
    var data;
    var cat_id = $('#item_cat').val();
    var dataArray = {action: "load_fabrics", cat_id: cat_id}
    $.post("./models/item_register_model.php", dataArray, function (reply) {
        $.each(reply, function (index, value) {
            if (select == value.fabric_id) {
                data += '<option value="' + value.fabric_id + '" selected="">' + value.fabric_name + '</option>';
            } else {
                data += '<option value="' + value.fabric_id + '">' + value.fabric_name + '</option>';
            }

        });
        $('#fabric_type').html('').append(data);
        load_designs();
    }, 'json');
}

function load_designs(select) {
    var data;
    var fabric_id = $('#fabric_type').val();
    var dataArray = {action: "load_designs", fabric_id: fabric_id}
    $.post("./models/item_register_model.php", dataArray, function (reply) {
        $.each(reply, function (index, value) {
            if (select == value.design_id) {
                data += '<option value="' + value.design_id + '" selected="">' + value.design_name + '</option>';
            } else {
                data += '<option value="' + value.design_id + '">' + value.design_name + '</option>';
            }
        });
        $('#design_type').html('').append(data);
        create_item_name();
    }, 'json');
}

function create_item_name() {
    var design = $("#design_type option:selected").html();
    var fabric = $("#fabric_type option:selected").html();
    var color = $('#color').val();
    var category = $("#item_cat option:selected").html();
    var size = $("#size option:selected").html();
    var item_name = design + ' ' + color + ' ' + fabric + ' ' + category + ' ' + size;
    $('#item_name').val(item_name);
}

function get_item_code() {
    var dataArray = {action: "get_item_code"}
    $.post("./models/item_register_model.php", dataArray, function (reply) {
        $('#item_code').val(reply);
    });
}




