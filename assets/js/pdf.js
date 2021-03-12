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
                //$('#reloadDownload').modal('hide');
            },1000);

        })


}