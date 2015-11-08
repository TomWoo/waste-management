    <form id="scimm-form" method="post" enctype="multipart/form-data">

    <script type="text/javascript">
        $("#run-button").click(function(event) {
           // event.preventDefault();
            var formFields = $("#scimm-form").serializeArray();
            $.ajax({
                type: 'POST',
                url: 'run.php',
                data: formFields,
                dataType: 'json'
            });
    </script>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Scrolling Nav JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/scrolling-nav.js"></script>

    <script src='https://www.google.com/recaptcha/api.js'></script>
    