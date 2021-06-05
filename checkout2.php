<?php
include_once("includes/bodyBase.inc.php");
top();
?>
<head>



<script>

    $(document).ready(function() {

        $('.method').on('click', function() {
            $('.method').removeClass('blue-border');
            $(this).addClass('blue-border');
        });

    })

    var $cardInput = $('.input-fields input');

    $('.next-btn').on('click', function(e) {

        $cardInput.removeClass('warning');

        $cardInput.each(function() {
            var $this = $(this);
            if (!$this.val()) {
                $this.addClass('warning');
            }
        })
    });
</script>

</head>
   <body style=" background-color: #0d0d0d">

     <section class="store" style="margin-top: 20px; margin-bottom: 20px; color: #FFFFFF;background-color: #0d0d0d; margin-left: 10%; margin-right: 10%">
        <div><h3 style="font-weight: bold">Checkout</h3></div>








        </section>



   </body>


    <!-- Footer Section Begin -->
    <?php
bottom();
?>