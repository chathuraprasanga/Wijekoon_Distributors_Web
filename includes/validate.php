<script type="text/javascript">

   function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            alert("Please enter only Numbers.");
            return false;
        }

        return true;
    }

    function ValidateNo() {
        var phoneNo = document.getElementById('phone');
        var email = document.getElementById('email');
        var mailFormat = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if (phoneNo.value == "" || phoneNo.value == null || email.value == "" ) {
            alert("Please enter your Mobile No. or Email ID");
            return false;
        }
        if (phoneNo.value.length < 10 || phoneNo.value.length > 10 || !mailFormat.test(email.value)) {
            alert("Mobile No. is not valid, Please Enter 10 Digit Mobile No. or Email Address is not valid, Please provide a valid Email");
            return false;
        }

        //alert("Success ");
        return true;
        }

        
</script>