<?php
echo $this->Html->css('/js/sweetalert/dist/sweetalert');
echo $this->Html->script('sweetalert/dist/sweetalert.min.js');
?>
<script>
    $(document).ready(function(){
        swal({
            title : "",
            text: "<?php echo $message; ?>",
            type: "info",
            timer: 2500
        });
    });
</script>