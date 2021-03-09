window.onload = function () {
    document.getElementById("download")
        .addEventListener("click", () => {
            const invoice = this.document.getElementById("summery-report");
            console.log(invoice);
            console.log(window);
            var name = document.getElementById('text-primary').innerHTML;
            var opt = {
                margin: 1,
                filename: name+'.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            };

            html2pdf().from(invoice).set(opt).save();
        })


}