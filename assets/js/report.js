function generateRep(){

    let type = $('#type').val();
    let from = $('[name=fromD]').val();
    let to = $('[name=toD]').val();

    if (type == null){
        $('#type').focus();
        return;
    }

    if (type == 'livestock'){
        if ($('#farmers').val() == null){
            $('#farmers').focus();
            return;
        }
        $('#download').prop('disabled', false);
        $('#search').attr('placeholder', 'Search by animal type');
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
                if(posts.length === 0){
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
                            "<td>Animals</td>"+
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
                                    "<td><button id='"+ posts[i].id +"' class='btn b btn-outline-success'><i class='fa fa-eye'></i>View</button></td>"+
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

function changeSelection(){
    let type = $('#type').val();
    if(type =='livestock'){
        $('.farmer-option').show();
    }else{
        $('.farmer-option').hide();
    }
}
function changeLivestock(){
    let id = $('select[name=farmers]').val();
    let name = $('#farmers option:selected').text();
    $('#text-primary').html(
        '<span>Name: '+name+'</span><br/>'+
        '<span>ID: '+id+'</span><br/>'
    );
    $('#summery-report tbody').html('');
    $.ajax({
        type: 'POST',
        url: './../admin/admin_handle.php',
        data: {
            livestockID:id,
        },
        success: function(response){
            var posts = JSON.parse(response);
            if(posts.length === 0){
                $('#summery-report tbody').html('<h2>No Data Found</h2>');
            }
            else{
                    $('#summery-report thead').html(
                        "<tr style='background: dimgrey'>" +
                        "<td>Serial No</td>" +
                        "<td>Animal</td>" +
                        "<td>Description</td>" +
                        "<td>Status</td>" +
                        "</tr>"
                    );
                    $.each(posts, function(i) {
                        if(posts[i].status == 'online'){
                            var test = "<td style='color: green'>" + posts[i].status + "</td>";
                        }else{
                            var test = "<td style='color: red'>" + posts[i].status + "</td>";
                        }
                        $('#summery-report tbody').append(
                            "<tr>" +
                            "<td>" + posts[i].serial_no + "</td>" +
                            "<td>" + posts[i].animal_type + "</td>" +
                            "<td>" + posts[i].description + "</td>" +
                            test+
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

window.onload = function () {
    document.getElementById("download")
        .addEventListener("click", () => {
            $('#reloadDownload').modal('show');
            const report = this.document.getElementById("summery-report");
            document.getElementById('img-report').innerHTML = '<img src="./../assets/img/logo.png">';
            var name = document.getElementById('text-primary').innerText;
            var opt = {
                margin: 1,
                filename: name+'.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            };

            setTimeout(function(){
                html2pdf().from(report).set(opt).save();
            },1000);
            setTimeout(function(){
                document.getElementById('img-report').innerHTML ='';

            },1000);
            setTimeout(function(){
                $('#reloadDownload').modal('hide');
            },3000);

        })


}