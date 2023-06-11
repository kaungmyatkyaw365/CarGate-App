@props([ 'title'=>'Loi Nan Khome',])
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title class="noprint">{{$title}}</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="../assets/js/fontawaesome.js" crossorigin="anonymous"></script>
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <link href="../assets/css/printjs.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/soft-ui-dashboardprint.css?v=1.0.7" type="text/css" media="print">

    <style>

      /* Allow content to break across pages */

        .modal-open {
            overflow: hidden;
        }
        .show{
            background: rgba(155, 152, 154, 0.6);
        }
        .modal-dialog{
            background: #fff;
        }
    </style>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/printjs.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/TableCheckAll.js"></script>
</head>

<body class="g-sidenav-show  bg-gray-100 ">
    <x-sidebar />
    <main style="margin-left: 200px;margin-right:0;" class=" main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-navbar />
        {{$slot}}
    </main>
    <x-rightsidebar />
    <!--   Core JS Files   -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/chartjs.min.js"></script>
    <script>
        
        // JavaScript code for print event
document.getElementById('printButton').addEventListener('click', function() {
  // Configure print options
  var printOptions = {
    printable: 'printjs', // ID of the element to print
    type: 'html', // Type of printable: 'html', 'image', 'pdf'
    // header: 'Your Custom Header', // Custom header text
    // footer: 'Your Custom Footer', // Custom footer text
    
    css: '../assets/css/soft-ui-dashboardprint.css?v=1.0.7' ,
    pagination: true // Enable pagination
  };

  // Call the print function
  window.printJS(printOptions);
});




        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }

        function change() {
            var percent = document.getElementById('percent').value;
            var workcost = document.getElementById('workcost').value;
            var totalhtml = document.getElementById('total');
            var totalget = document.getElementById('totalget');
            var total1 = document.getElementById('total1');
            var balance = document.getElementById('balance');
            var totalSite = document.getElementById('totalSite').value;
            var payment = document.getElementById('payment').value;
            var paided = document.getElementById('paidedValue').value;
            var insurance = document.getElementById('insurance').value;

            var total = Number(totalSite) + Number(percent) + Number(workcost) + Number(insurance) - Number(paided);
            var totalget1 = Number(totalSite) + Number(percent) + Number(workcost) + Number(insurance);
            totalhtml.value = total;
            total1.value = total;
            totalget.value = totalget1;
            balance.value = total - payment;
        }

        function changepay() {
            var total = document.getElementById('total').value;
            var payment = document.getElementById('payment').value;
            var balance = document.getElementById('balance');

            balance.value = total - payment;
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="../assets/js/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
    <script src="../assets/js/jquery.js"></script>
    <x-js />
</body>

</html>