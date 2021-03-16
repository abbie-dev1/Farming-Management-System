<?php include './../includes/session.php'; ?>
<?php include './../includes/navbar.php';

//if(isset($_SESSION['user']) == 'admin'){
//    header('location: ./../admin/welcome.php');
//}
//
//
//if(!isset($_SESSION['loggedin'])){
//    header('location: ./../login.php');
//}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="../css/cards.css" />
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js"></script>
    <style type="text/css"> body{ font: 14px sans-serif;
            text-align: center; }
    </style>


</head>

<body style="display: flex">
<?php include("../includes/side-menu.php")?>
<div class="body-content">
<div class="page-header">
    <?php
    if(isset($_SESSION['error'])){
        echo "
                        <div class='alert alert-warning beautiful' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                           ".$_SESSION['error']."</div>
                        ";
        unset($_SESSION['error']);
    }

    if(isset($_SESSION['success'])){
        echo "
                        <div class='alert btn-success beautiful' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                           ".$_SESSION['success']."</div>
                        ";
        unset($_SESSION['success']);
    }


    ?>
    <h1>Farmer Dashboard</h1>
    <button class="btn btn-warning addnew">Add Tracker</button>
</div>


    <h4 class="row" style="padding: 10px" align="center">
        <div id="svgcanvas">
<?php
        $conn = $pdo->open();

        try {
            $stmt = $conn->prepare("SELECT * FROM livestock WHERE farmer_id=:id");
            $stmt->execute(['id'=>$_SESSION['admin']]);
        }
        catch (Exception $e){
            print_r($e->getMessage());
        }



        if($stmt->rowCount() > 0) {
            $count=0;
            foreach ($stmt as $key=> $row) {

                echo ' 
                
                <button class="front-btn '.$count.'" style="margin: 5px"><div class="frontside '.$row["animal_type"].'  ">
                            <div class="card">
                                <div class="card-body">
                                    <p><img src="../assets/img/info_animals/'.$row["image"].'"></p>
                                    <h4 class="card-title">'.$row["animal_type"].' ';
                                        if($row["status"] =="online")
                                        {
                                            echo'<i class="fa fa-circle text-success"></i>';
                                        }else
                                        {
                                            echo '<i class="fa fa-circle text-danger" ></i>';
                                        }


                                    echo'</h4>
                                    <p class="card-text">Ser No: '.$row["serial_no"].' </p>
                                    <p>';

                                         if($row["status"] =="online")
                                        {
                                            echo'<a id="'.$row["serial_no"].'"  class="btn btn-warning btn-sm anim_trace"><i class="fa fa-location-arrow"></i></a> ';
                                        }
                                         echo'
                                         
                                         <a id="'.$row["serial_no"].'"  class="btn btn-danger btn-sm anim_delete"><i class="fa fa-trash"></i></a>  
                                     </p> 
                                </div>
                            </div>
                        </div></button>
                         ';
                $count++;
            }

            $pdo->close();
            echo '   </table>';
        }else{
            echo '<h3>No Records Found ...</h3>' ;
        }
        ?>
        </div>


    <div class="pagination">
        <a id="first" href="#">&laquo;</a>
        <a id="one" href="#" class="active">1</a>
        <a id="two" href="#">2</a>
        <a id="three" href="#">3</a>
        <a id="four" href="#">4</a>
        <a  id="five" href="#">5</a>
        <a id="six" href="#">6</a>
        <a id="last" href="#">&raquo;</a>
    </div>
</div>

</body>
</html>

<?php include('./../farmer/files/farmer_modal.php') ?>
<?php include('./../includes/scripts.php') ?>

<script>
    var variable=null;
    $(function() {
        $(document).on('click', '.anim_delete', function (e) {

            e.preventDefault();
            var id = this.id;
            $('.anim_span').html('<h5>Serial No: <span style="color: orange">'+id+'</span></h5>');
            $('.anim_delete').val(id);
            $('#amin_delete').modal('show');
        });

        $(document).on('click', '.editFarmer', function (e) {

            e.preventDefault();
            editFarmer();
            $('#edit').modal('show');
        });

        $(document).on('click', '.pagination a', function (e) {

            e.preventDefault();
            var id = this.id;

            if(id == "first"){
                $('#'+$('.pagination').children('a:visible').eq(1).attr('id')).click();
            }
            if(id == "one"){
                $('.front-btn').css('display','none');
                for (var i=0;i<8;i++){
                    $('.'+i).css('display','initial');
                }
            }
            if(id == "two"){
                $('.front-btn').css('display','none');
                for (var i=9;i<18;i++){
                    $('.'+i).css('display','initial');
                }
            }if(id == "three"){
                $('.front-btn').css('display','none');
                for (var i=19;i<28;i++){
                    $('.'+i).css('display','initial');
                }
            }if(id == "four"){
                $('.front-btn').css('display','none');
                for (var i=29;i<38;i++){
                    $('.'+i).css('display','initial');
                }
            }if(id == "five"){
                $('.front-btn').css('display','none');
                for (var i=39;i<48;i++){
                    $('.'+i).css('display','initial');
                }
            }if(id == "six"){
                $('.front-btn').css('display','none');
                for (var i=49;i<58;i++){
                    $('.'+i).css('display','initial');
                }
            } if(id == "last"){
                console.log();
                $('#'+$('.pagination').children('a:visible').eq(-2).attr('id')).click();
            }
        });

        $(document).on('click', '.addnew', function (e) {

            e.preventDefault();
            $('#addnew').modal('show');
        });


        $(document).on('click', '.anim_trace', function (e) {

            e.preventDefault();
            var id = this.id;
            variable=id;
            getCoords(id);
           $('#maps').modal('show');
        });

    });

    function editFarmer(){
        $.ajax({
            type: 'POST',
            url: './../farmer/farmer_handle.php',
            data: {profile:5},
            dataType: 'json',
            success: function(response){

                $('input[name=edit_farmer]').val(response.id);
                $('input[name=firstname]').val(response.firstName);
                $('input[name=lastname]').val(response.lastName);
                $('input[name=email]').val(response.email);
                $('input[name=gender]').val(response.gender);
                $('input[name=mobile]').val(response.mobile);
                $('input[name=address]').val(response.address);

            }
        });

    }

    function getCoords(id){
        var geo=[];
            $.ajax({
                type: 'POST',
                url: './../farmer/farmer_handle.php',
                data: {coords:id},
                dataType: 'json',
                async: false,
                success: function(response){
                    response.forEach(function (data, i) {
                        geo[i] = {
                                "id": 'id'+i,
                                "description": data.description,
                                "name": data.animal_type,
                                "status":data.status,
                                "serial":data.serial_no,
                                "lat": parseFloat(data.latitude),
                                "long": parseFloat(data.longitude)
                                 };


                    });


                }
            });

            setMarkers(geo);
    }


    setInterval(function () {

        if(variable !=null) {

            var updatedJson=[];
            $.ajax({
                type: 'POST',
                url: './../farmer/farmer_handle.php',
                data: {coords:variable},
                dataType: 'json',
                async: false,
                success: function(response){
                    response.forEach(function (data, i) {
                        updatedJson[i] = {
                            "id": 'id'+i,
                            "description": data.description,
                            "name": data.animal_type,
                            "status":data.status,
                            "serial":data.serial_no,
                            "lat": parseFloat(data.latitude),
                            "long": parseFloat(data.longitude)
                        };

                    });


                }
            });
            setMarkers(updatedJson);
            }
    }, 10000);



    $('.front-btn').css('display','none');
    for (var i=0;i<8;i++){
        $('.'+i).css('display','initial');
    }


    $('#svgcanvas button').each(function(i) {
        //var classNum=$(this).attr('class');

        if(i > -1 && i < 8){

            $('#one').css('display','initial');
        }
        if(i > 9 && i < 18){
            $('#first').css('display','initial');
            $('#last').css('display','initial');
            $('#two').css('display','initial');
        }
        if(i > 19 && i < 28){
            $('#three').css('display','initial');
        }
        if(i > 29 && i < 38){
            $('#four').css('display','initial');
        }
        if(i > 39 && i < 48){
            $('#five').css('display','initial');
        }
        if(i > 49 && i < 58){
            $('#six').css('display','initial');
        }



    });


        // for (var i=0;i<8;i++){
        //     var classNum = $('.'+i);
        // }
        //
        //
        // for (var i=9;i<18;i++){
        //     $('.'+i).css('display','initial');
        // }
        //
        //
        // for (var i=19;i<28;i++){
        //     $('.'+i).css('display','initial');
        // }
        //
        // $('.front-btn').css('display','none');
        // for (var i=29;i<38;i++){
        //     $('.'+i).css('display','initial');
        // }
        //
        // $('.front-btn').css('display','none');
        // for (var i=39;i<48;i++){
        //     $('.'+i).css('display','initial');
        // }
        //
        // $('.front-btn').css('display','none');
        // for (var i=49;i<58;i++){
        //     $('.'+i).css('display','initial');
        // }

    function changeBreed() {
        var type =  $('select[name=animal_type]').val();
        $('.breed_container').show();

        if(type == 'pig'){
           $('.breed_select').html(
               '<select name="breed_type" class="form-control" onchange="changeImg()" required>\n' +
               '     <option value="" disabled selected>Select Breed Type ...</option>\n' +
               '     <option value="pigs/duroc.jpg">Doroc</option>\n' +
               '     <option value="pigs/landrace.jpeg">Landrace</option>\n' +
               '</select>'
           ) ;
        }
        if(type == 'chicken'){
            $('.breed_select').html(
                '<select name="breed_type" class="form-control" onchange="changeImg()" required>\n' +
                '     <option value="" disabled selected>Select Breed Type ...</option>\n' +
                '     <option value="chicken/dual-purpose.jpg">Dual Purpose</option>\n' +
                '     <option value="chicken/egg-laying.jpg">Eggs Laying</option>\n' +
                '     <option value="chicken/meat-producing.jpg">Meat Producing</option>\n' +
                '</select>'
            ) ;

        }
        if(type == 'horse'){
            $('.breed_select').html(
                '<select name="breed_type" class="form-control" onchange="changeImg()" required>\n' +
                '     <option value="" disabled selected>Select Breed Type ...</option>\n' +
                '     <option value="horse/draft.jpeg">Draft</option>\n' +
                '     <option value="horse/pony.jpg">Pony</option>\n' +
                '</select>'
            ) ;
        }
        if(type == 'cattle'){
            $('.breed_select').html(
                '<select name="breed_type" class="form-control" onchange="changeImg()" required>\n' +
                '     <option value="" disabled selected>Select Breed Type ...</option>\n' +
                '     <option value="cattle/angus.jpeg">Angus</option>\n' +
                '     <option value="cattle/holstein.jpeg">Holstein</option>\n' +
                '</select>'
            ) ;
        }
        if(type == 'goat'){
            $('.breed_select').html(
                '<select name="breed_type" class="form-control" onchange="changeImg()" required>\n' +
                '     <option value="" disabled selected>Select Breed Type ...</option>\n' +
                '     <option value="goat/anglo-nubian.jpeg">Anglo Nubian</option>\n' +
                '     <option value="goat/boer.jpeg">Boer</option>\n' +
                '     <option value="goat/saanen.jpeg">Saanen</option>\n' +
                '</select>'
            ) ;
        }

    }

    function changeImg() {

        $('.anim_desc').show();
        var breed = $('select[name=breed_type]').val();
        $('.breed_img').attr('src','../assets/img/info_animals/'+breed);
        // Goats
        if(breed =='goat/anglo-nubian.jpeg') {
            $('#description').text('The Boer goat is a breed of goat that was developed in South Africa in the early ' +
                '1900s and is popular breed for meat production. Their name derived from the Afrikaans word boer, meaning farmer..');
        }
        if(breed =='goat/saanen.jpeg') {
            $('#description').text('The Anglo-Nubian is a British breed of domestic goat. It originated in the 19th century ' +
                'from cross-breeding between native British goats and a mixed population of large lop-eared goats imported from India.');
        }
        if(breed =='goat/saanen.jpeg') {
            $('#description').text('Saanen dairy goat is the most widely distributed dairy goat in the world and is valued for ' +
                'its abundant milk production, hardiness and calm, sweet nature, pure white in color. It is considered the largest breed of dairy goats.');
        }

        // Chickens
        if(breed =='chicken/dual-purpose.jpg') {
            $('#description').text('The Boer goat is a breed of goat that was developed in South Africa in the early ' +
                '1900s and is popular breed for meat production. Their name derived from the Afrikaans word boer, meaning farmer..');
        }
        if(breed =='chicken/egg-laying.jpg') {
            $('#description').text('The Anglo-Nubian is a British breed of domestic goat. It originated in the 19th century ' +
                'from cross-breeding between native British goats and a mixed population of large lop-eared goats imported from India.');
        }
        if(breed =='chicken/meat-producing.jpg') {
            $('#description').text('Saanen dairy goat is the most widely distributed dairy goat in the world and is valued for ' +
                'its abundant milk production, hardiness and calm, sweet nature, pure white in color. It is considered the largest breed of dairy goats.');
        }
    }


</script>
<script src="./../assets/js/maps.js"></script>