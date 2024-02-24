<div class="tab-pane fade show active" id="cc_add_direct_codes" role="tabpanel" aria-labelledby="cc_add_direct_codes-tab">
    <form action="{{ route('admin.card_codes.store') }}" method="post">
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




        {{-- card codes  --}}
        <div class="row pt-3">
            <div class="col-12">
                <label for="code">إضافة الاكواد</label>
                <textarea name="code" value="" id="code" style="width:100%;height:300px;"
                    placeholder="يرجي إدخال الاكواد الخاصة ومن ثم النقر على enter "></textarea>
            </div>
        </div>

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
</div>
