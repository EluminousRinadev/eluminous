<script type="text/javascript">
jQuery(document).ready(function () { 
	$("#dedicatedDeveloperSubmit").click(function () {
        var currentSiteUrl = "https://eluminoustechnologies.com/";
        thank_siteUrl = currentSiteUrl + "thank-you";
        var e = dedicatedPageNameValidation(),
        a = dedicatedPageEmailValidation();
        dedicatedPagephoneLimitCheck(),
        e &&
        a &&
        (jQuery("#dedicatedDeveloperSubmit").attr("disabled", !0),
        jQuery("#dedicatedDeveloperSubmit").addClass("disableBtn"),
        (formDedidatedDataArray.skypeId = $("#dedicatedPageSkypeId").val()),
        (formDedidatedDataArray.message = $("#dedicatedPageName").val()),
        (formDedidatedDataArray.authentication = "dedicatedFormSubmissionDetails"),
        $.ajax({
            url: currentSiteUrl + "dedicatedPageFormResponse",
            type: "post",
            dataType: "json",
            data: {
                authentication: "dedicatedFormSubmissionDetails",
                name: formDedidatedDataArray.name,
                email: formDedidatedDataArray.email,
                mobile: formDedidatedDataArray.mobile,
                skypeId: formDedidatedDataArray.skypeId,
                message: formDedidatedDataArray.message,
            },
            success: function (e) {},
        }),
        setTimeout(function () {
            window.location = thank_siteUrl;
        }, 3e3));
    });
});

var $,
    formDedidatedDataArray = [];
   function dedicatedPageNameValidation() {
       var e = $("#dedicatedPageName").val();
       return (e = e.trim())
           ? /^[A-Za-z\s]+$/.test(e)
               ? ($(".dedicatedPageNameError").html(""), (formDedidatedDataArray.name = $("#dedicatedPageName").val()), !0)
               : ($(".dedicatedPageNameError").html("You have entered wrong name"), !1)
           : ($("#dedicatedPageName").val(""), $(".dedicatedPageNameError").html("Please fill your name"), !1);
   }
   function dedicatedPageEmailValidation() {
       var e = $("#dedicatedPageEmail").val();
       if (e)
           return 0 == /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/.test(e)
               ? ($(".dedicatedPageEmailError").html("You have entered wrong email"), !1)
               : ($(".dedicatedPageEmailError").html(""), (formDedidatedDataArray.email = $("#dedicatedPageEmail").val()), !0);
       $(".dedicatedPageEmailError").html("Please fill your email");
   }
   function checkPhoneKey(e) {
       return (e >= "0" && e <= "9") || "ArrowLeft" == e || "ArrowRight" == e || "Delete" == e || "Backspace" == e;
   }
   function dedicatedPagephoneLimitCheck() {
       return $("#dedicatedPageMobile").val()
           ? ((length = document.getElementById("dedicatedPageMobile").length),
             length < 10 || length > 14 ? ($(".dedicatedPageMobileError").html("You have entered wrong Phone Number"), !1) : ($(".dedicatedPageMobileError").html(""), (formDedidatedDataArray.mobile = $("#dedicatedPageMobile").val()), !0))
           : ($(".dedicatedPageMobileError").html(""), !0);
   }
   function scrollNav() {
       $(".scroll-down").click(function () {
           return (
               $("html, body")
                   .stop()
                   .animate({ scrollTop: $($(this).attr("href")).offset().top - 90 }, 400),
               !1
           );
       }),
           $(".scrollTop a").scrollTop();
   }
</script>