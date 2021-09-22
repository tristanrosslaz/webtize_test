
<div class="content-inner text-center" id="pageActive" data-namecollapse="" data-labelname="Inventory List"> 

    <br>
    <br>
    <h1>Sorry we're doing some work on the site</h1>
    <h4>Thank you for being patient. We are doing some enhancment to the site and will be back shortly.</h4>
    <br>
    <br>
    <img src="<?=base_url("assets/img/atwork.png");?>" alt="..." class="img-fluid">
    <br>
    <br>
    <br>
    <h4>Check our social media platforms for some updates,</h4>
    <img src="<?=base_url("assets/img/fblogo.png");?>" id="btnFb" style="width:4%;" alt="..." class="img-fluid">
    <img src="<?=base_url("assets/img/iglogo.png");?>" id="btnIg" style="width:3.5%;" alt="..." class="img-fluid">

<?php $this->load->view('includes/footer');?> <!-- includes your footer -->
<script>
    $("#pageActive").attr('data-num', localStorage.getItem("currentPageId"));

    $(document).ready(function(){
        $("#btnFb").on("click", function(){
            window.open("https://www.facebook.com/PandaBooksPH/", '_blank');
        });

        $("#btnIg").on("click", function(){
            window.open("https://www.instagram.com/pandabooks.ph/", '_blank');
        });
    });
</script>
    