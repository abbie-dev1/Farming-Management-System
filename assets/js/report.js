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

    $('#text-primary').html(type+' from '+from+' to '+to);
    $('#summery-report tbody').html('');
        $.ajax({
            type: 'POST',
            url: './../admin/admin_handle.php',
            data: {
                report:type,
                startDate:from,
                endDate:to
                },
            success: function(response){
                var posts = JSON.parse(response);
                if(posts === false){
                    $('#summery-report tbody').html('<h2>No Data Found</h2>');
                }
                else{
                    if(posts[0].gender !== undefined){
                        $('#summery-report thead').html(
                            "<tr style='background: dimgrey'>" +
                            "<td>Firs Name</td>" +
                            "<td>Last Name</td>" +
                            "<td>Gender</td>" +
                            "<td>Email</td>" +
                            "<td>Address</td>"+
                            "</tr>"
                        );
                        $.each(posts, function(i) {

                            $('#summery-report tbody').append(
                                "<tr>" +
                                    "<td>" + posts[i].firstName + "</td>" +
                                    "<td>" + posts[i].lastName + "</td>" +
                                    "<td>" + posts[i].gender + "</td>" +
                                    "<td>" + posts[i].email + "</td>" +
                                    "<td>" + posts[i].address+"</td>"+
                                "</tr>"

                            );
                        });
                    }else{
                        $('#summery-report thead').html(
                            "<tr style='background: dimgrey'>" +
                            "<td>Name</td>" +
                            "<td>Email</td>" +
                            "<td>Mobile</td>" +
                            "</tr>"
                        );
                        $.each(posts, function(i) {

                            $('#summery-report tbody').append(
                                "<tr>" +
                                    "<td>" + posts[i].name + "</td>" +
                                    "<td>" + posts[i].email + "</td>" +
                                    "<td>" + posts[i].mobile + "</td>" +
                                "</tr>"

                            );
                        });
                    }



                }

            },
            error: function (error){
                console.error(error);
            }
        });

    $('#download').prop('disabled', false);

}
