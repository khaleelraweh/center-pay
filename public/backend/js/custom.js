// لتنسيق رسالة التنبيهات القادمة مع الراوت 
// رسالة التنبيهات موجودة في الملف
// views/partial/backend/flash.blade.php
// هذا الكود يقوم باستدعاء الاليرت ثم اعمل لها فيد تو بعد خمس ثواني 
// واعمل لها سلايد اب بسرعة نص ثانية
$(function(){
    $("#alert-message").fadeTo(5000,500).slideUp(500,function(){
        $("#alert-message").slideUp(500);
    })
});
