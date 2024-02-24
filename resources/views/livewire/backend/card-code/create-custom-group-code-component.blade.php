<form action="{{ route('admin.card_codes.store_custom_group_codes') }}" method="post">
    @csrf
    {{-- card category  field --}}
    <div class="row pt-3">
        <div class="col-12 ">
            <label for="product_category_id">تصنيف البطائق</label>
            <select wire:model="selectedCardCategory" name="product_category_id" class="form-control">
                <option value="">---</option>
                @forelse ($card_categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('product_category_id') == $category->id ? 'selected' : null }}>
                        {{ $category->category_name }}</option>
                @empty
                @endforelse
            </select>
        </div>
    </div>

    {{-- card name  field --}}
    <div class="row pt-3">
        <div class="col-12 ">
            <label for="card_id"> البطائق</label>
            <select wire:model="selectedCard" name="product_id" class="form-control">
                <option value="">---</option>
                @forelse ($cards as $card)
                    <option value="{{ $card->id }}" {{ old('product_id') == $card->id ? 'selected' : null }}>
                        {{ $card->product_name }}</option>
                @empty
                @endforelse
            </select>
        </div>
    </div>


    <fieldset class="mt-3" style="border:2px dotted black;padding: 5px 10px 20px 10px;">
        <legend style="float: none;margin-right:20px;margin-left: 20px; width: fit-content; font-size:18px;">
            ملاحظات مهمة
        </legend>
        <span>
            يستخدم هذا النظام لاضافة كود مخصص للبطاقة من خلال انشاء حقول يتم تسميتها واضافة القيمة
            المخصصة لها
        </span>
        <div class="alert alert-info mt-2">
            تنبيه ! إستخدم النظام لإضافة الاكواد المخصصة بشكل اسرع مع مراعاة
            توافق عدد المدخلات مع القيم المدخلة في كل حقل
        </div>
    </fieldset>

    <fieldset class="mt-3" style="border:2px dotted black;padding: 5px 10px 20px 10px;">
        <legend style="float: none;margin-right:20px;margin-left: 20px; width: fit-content; font-size:18px;">
            إضافة الاكواد</legend>

        {{-- card codes [0]  --}}
        <div class="row ">

            <div class="col-sm-12 col-md-6 pt-3">
                <div class="form-group">
                    <label for="code_name[0]">ادخل اسم الحقل </label>

                    <input type="text" name="code_name[0]" id="code_name[0]" class="form-control">

                    @error('code_name[0]')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-sm-12 col-md-6 pt-3">
                <div class="form-group">
                    <label for="code[0]"> القيمة </label>

                    <textarea name="code[0]" value="" id="code[0]" style="width:100%;height:200px;"
                        placeholder="يرجي إدخال الاكواد الخاصة ومن ثم النقر على enter "></textarea>

                    @error('code[0]')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        {{-- card codes [1]  --}}
        <div class="row ">

            <div class="col-sm-12 col-md-6 pt-3">
                <div class="form-group">
                    <label for="code_name[1]">ادخل اسم الحقل </label>

                    <input type="text" name="code_name[1]" id="code_name[1]" class="form-control">

                    @error('code_name[1]')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-sm-12 col-md-6 pt-3">
                <div class="form-group">
                    <label for="code[1]"> القيمة </label>

                    <textarea name="code[1]" value="" id="code[1]" style="width:100%;height:200px;"
                        placeholder="يرجي إدخال الاكواد الخاصة ومن ثم النقر على enter "></textarea>

                    @error('code[1]')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        {{-- card codes [2]  --}}
        <div class="row ">

            <div class="col-sm-12 col-md-6 pt-3">
                <div class="form-group">
                    <label for="code_name[2]">ادخل اسم الحقل </label>

                    <input type="text" name="code_name[2]" id="code_name[2]" class="form-control">

                    @error('code_name[2]')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-sm-12 col-md-6 pt-3">
                <div class="form-group">
                    <label for="code[2]"> القيمة </label>

                    <textarea name="code[2]" value="" id="code[2]" style="width:100%;height:200px;"
                        placeholder="يرجي إدخال الاكواد الخاصة ومن ثم النقر على enter "></textarea>

                    @error('code[2]')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        {{-- card codes [3]  --}}
        <div class="row ">

            <div class="col-sm-12 col-md-6 pt-3">
                <div class="form-group">
                    <label for="code_name[3]">ادخل اسم الحقل </label>

                    <input type="text" name="code_name[3]" id="code_name[3]" class="form-control">

                    @error('code_name[3]')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-sm-12 col-md-6 pt-3">
                <div class="form-group">
                    <label for="code[3]"> القيمة </label>

                    <textarea name="code[3]" value="" id="code[3]" style="width:100%;height:200px;"
                        placeholder="يرجي إدخال الاكواد الخاصة ومن ثم النقر على enter "></textarea>

                    @error('code[3]')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
    </fieldset>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group pt-3 ">
                <button type="submit" name="submit" class="btn btn-primary">
                    {{ __('panel.save_data') }}
                </button>
            </div>
        </div>
    </div>
    {{-- {{ dd($product_categories) }} --}}
</form>
