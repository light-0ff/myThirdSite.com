// (function () {
//     window.addEventListener('load', function () {
//         /*var onclass = this.document.querySelectorAll('select');
//         console.log(onclass[3].value);
//         //*
//         onclass.addEventListener('onclick', function(){
//             onclass.setAttribute('asdasd')
//         });
//         // 
//         var id = this.document.getElementById('id');
//         */


//         $
//     })
// })()

$(function () {
    $selects = $('.selectCurrentCategory');
    $selects.each(function (index, elem) {
        var onchanged = false;
        $(elem).attr('oldVal', $(this).val());
        $(this).change(function(){
            if(onchanged == false){
                var oldID = $(this).attr('oldVal');
                var selectedID = $( this ).val();
                // var post_id = $(this).parent().parent()[0][0].value;
                // console.log(oldID + " " + selectedID);
                $save = $('<button type="submit" name="savecatpostok" class="btn btn-theme">Сохранить</button>');
                $cancel = $('<button type="reset" name="savecatpostcancel" class="btn btn-danger">Отменить</button>');
                $(elem).parent().append($save);
                $(elem).parent().append($cancel);
                onchanged = true;
                $cancel.on('click', function(){
                    // $del_ok = $($cancel).parent().parent()[0][3];
                    // $del_can = $($cancel).parent().parent()[0][4];
                    // console.log($del_ok);
                    // console.log($del_can);
                    // $($del_ok).remove();
                    // $($del_can).remove();
                });
                $save.on('click', function(){

                });
            }
        })
    });

})