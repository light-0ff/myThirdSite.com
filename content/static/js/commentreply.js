(function () {
    $(document).ready(function () {
        $commentTable = $('.commentsBlock .overflow-hidden .mb-2');

        $reply = $commentTable.find('.link');

        $reply.on('click', function () {
            //находим юзер id
            $buffer = $(this).parent().parent().find('.userId').text();
            //отправляем юзерИд в инпут форми
            $('#parent').val($buffer);
            console.log($('#parent').val());
        });
    });
})();
