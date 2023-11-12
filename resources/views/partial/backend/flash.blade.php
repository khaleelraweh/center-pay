{{-- اذا كان عندي ميسج قادمة مع الراوت نفذ التالي --}}
@if (session()->has('message'))
    {{-- لتحديد نوع الاليرت بناء علي نوع الرسالة القادمة من الرابط نستخدم مفاهيم السيشن --}}
    <div class="alert alert-{{session()->get('alert-type')}} alert-dismissible" role="alert" id="alert-message">
        {{session()->get('message')}}
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
@endif
