/**
 * Created by ArsipTI.com on 01/12/2016.
 */
 

//Menampilkan Form  dan Data
$(document).on('click','.open_modal',function(){
    var kejuruan_id = $(this).val();

    $.get(url + '/' + kejuruan_id, function (data) {
        //success data
        console.log(data);
        $('#tag_id').val(data.id);
        $('#kd_kejuruan').val(data.kd_kejuruan);
        $('#nama_kejuruan').val(data.nama_kejuruan);
        $('#keterangan').val(data.keterangan);
        $('#btn-save').val("update");
        $('#myModal').modal('show');
    })
});
//Menampilkan Isian Form
$('#btn_add').click(function(){
    $('#btn-save').val("add");
    $('#frmTags').trigger("reset");
    $('#myModal').modal('show');
});
// //Menghapus data
// $(document).on('click','.delete-tag',function(){
//     var kejuruan_id = $(this).val();
//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
//         }
//     })
//     $.ajax({
//         type: "DELETE",
//         url: url + '/' + kejuruan_id,
//         success: function (data) {
//             console.log(data);
//             $("#tag" + kejuruan_id).remove();
//         },
//         error: function (data) {
//             console.log('Error:', data);
//         }
//     });
// });
//membuat tag / update tag
// $("#btn-save").click(function (e) {
//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
//         }
//     })
//     e.preventDefault();
//     var formData = {
//         tagname: $('#tagname').val(),
//         slug: $('#slug').val(),
//     }
//     //Jika Tombol Simpan ditekan/diklik [tambah=POST], [perbaharui=PUT]
//     var state = $('#btn-save').val();
//     var type = "POST"; //membuat data baru
//     var kejuruan_id = $('#kejuruan_id').val();;
//     var my_url = url;
//     if (state == "update"){
//         type = "PUT"; //memperbaharui data yang sudah ada
//         my_url += '/' + kejuruan_id;
//     }
//     // console.log(formData);
//     // $.ajax({
//     //     type: type,
//     //     url: my_url,
//     //     data: formData,
//     //     dataType: 'json',
//     //     success: function (data) {
//     //         console.log(data);
//     //         var tag = '<tr id="tag' + data.id + '"><td>' + data.id + '</td><td>' + data.tagname + '</td><td>' + data.slug + '</td>';
//     //         tag += '<td><button class="btn btn-warning btn-detail open_modal" value="' + data.id + '">Edit</button>';
//     //         tag += ' <button class="btn btn-danger btn-delete delete-tag" value="' + data.id + '">Delete</button></td></tr>';
//     //         if (state == "add"){ //jika data baru ditambahkan
//     //             $('#tags-list').append(tag);
//     //         }else{ //jika data diperbaharui
//     //             $("#tag" + tag_id).replaceWith( tag );
//     //         }
//     //         $('#frmTags').trigger("reset");
//     //         $('#myModal').modal('hide')
//     //     },
//     //     error: function (data) {
//     //         console.log('Error:', data);
//     //     }
//     // });
// });