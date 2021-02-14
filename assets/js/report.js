function generateRep(){
    let type = $('#type').val();
    let from = $('[name=fromD]').val();
    let to = $('[name=toD]').val();

    if (type == null){
        $('#type').focus();
        return;
    }
    if (from == ''){
        $('[name=fromD]').focus();
        return;
    }
    if (to == ''){
        $('[name=toD]').focus();
        return;
    }

    if (from > to){
        $('.date-error').css('color','red').html('Start Date can not be greater than End Date !!');
        return;
    }

        $.ajax({
            type: 'POST',
            url: './../admin/reports_row.php',
            data: {
                type:type,
                startDate:from,
                endDate:to
                },
            success: function(response){
                var posts = JSON.parse(response);
                if(posts === false){
                    $('#drivers-report tbody').html('<h2>No Data Found</h2>');
                }
                else{
                    $.each(posts, function() {

                        $('#drivers-report tbody').html(
                            "<tr>" +
                            "<td>" + posts.cust_name + "</td>" +
                            "<td>" + posts.driver_name + "</td>" +
                            "                    <td>" + posts.pick_up + "</td>" +
                            "                    <td>" + posts.destination + "</td>" +
                            "                    <td>" + posts.book_date+"</td>"+
                            "</tr>"

                        );
                    });
                }

            },
            error: function (error){
                console.error(error);
            }
        });

}
