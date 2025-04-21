function fetchDataAjax() {
    $.ajax({
        url: "/blogs",
        type: "GET",
        dataType: "json",
        success: function (data) {
            let tableBody = "";
            $.each(data.blogs, function (index, blog) {
                tableBody += `
                    <tr>
                        <td>${index + 1}</td>
                        <td ><img src="${
                            blog.image
                        }" alt="Image" width="50"></td>
                        <td>${blog.title}</td>
                        <td>${blog.description}</td>
                        <td class="no-wrap">
                            <button  data-id="${
                                blog.id
                            }" class="btn btn-warning btn-sm waves-effect waves-light" onclick="fetchEditAjax(${
                                blog.id
                            })">
                                <i class="ti ti-edit "></i>
                            </button>
                            <button type="button" onclick="deleteItem(event)" class="btn btn-danger btn-sm waves-effect waves-light">
                                <i class="ti ti-trash "></i>
                            </button>
                        </td>
                    </tr>
                `;
            });
            $.each(data.categories, function (index, category) {
                $("#select-category").append(
                    `<option value="${category.id}">${category.name}</option>`
                );
            });
            $("#table-body").html(tableBody);
        },
        error: function (xhr, status, error) {
            console.error(error);
        },
    });
}

let editId = null;
function fetchEditAjax(id) {
    console.log(id);
    $.ajax({
        url: "/blogs/" + id + "/edit",
        type: "GET",
        dataType: "json",
        success: function (data) {
            $("#staticBackdropLabel").text("Edit blog");
            $("#submit").text("Edit");
            // $('#image').val(data.data.image);
            $("#image").attr("src", data.blogs.image);
            $("#title").val(data.blogs.title);
            $("#description").val(data.blogs.description);
            $("#select-category").val(data.blogs.category_id).trigger("change");
            editId = data.blogs.id;
            console.log(editId)
            showModal();
        },
        error: function (xhr, status, error) {
            console.error(error);
        },
    });
}

function resetFormForCreate() {
    $("#title").val("");
    $("#description").val("");
    $("#image").val("");
    $("#staticBackdropLabel").text("Create blog");
    $("#submit").text("Create");
    editId = null;
    showModal();
}

function actionForm(event){
    event.preventDefault();
    if(editId === null){
        $.ajax({
            url: "/blogs",
            type: "POST",
            data: {
                title: $("#title").val(),
                description: $("#description").val(),
                category_id: $("#select-category").val(),
                image: $("#image").val(),
            },
            success: function (data) {
                fetchDataAjax();
                $("#staticBackdrop").modal("hide");
            },
            error: function (xhr, status, error) {
                console.error(error);
            },
        })
    }else{
        $.ajax({
            url : `/blogs/${editId}/edit`,
            type : "PUT",
            title: $("#title").val(),
            description: $("#description").val(),
            category_id: $("#select-category").val(),
            image: $("#image").val(),
        })
    }
}
$(document).ready(function () {
    fetchDataAjax();
});
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});