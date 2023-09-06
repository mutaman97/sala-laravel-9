@foreach($info->optionwithcategories ?? [] as $key => $row)
<div class="option-colors">

	<h6><span class="text-danger {{ $row->is_required == 1 ? 'required_var' : '' }}" data-id="{{$row->id}}">{{ $row->is_required == 1 ? '*' : '' }}</span>{{ $row->category->name ?? '' }} :</h6>

	@foreach($row->priceswithcategories ?? [] as $k => $price)
	<div class="single_color color">
	@if($row->category->slug == 'checkbox')
	&nbsp
	<input

	class="custom-control variations{{$row->id}} pricesvariations {{ $row->is_required == 1 ? 'req' : '' }}"
	data-stockstatus="{{ $price->stock_status }}"
	data-stockmanage="{{ $price->stock_manage }}"
	data-sku="{{ $price->sku }}"
	data-qty="{{ $price->qty }}"
	data-oldprice="{{ $price->old_price }}"
	data-price="{{ $price->price }}"
	type="{{ $row->select_type == 1 ? 'checkbox' : 'radio' }}"
	id="variation{{ $price->id.$k+$key }}"
	name="option[{{$row->id}}][]"
	value="{{ $price->id ?? '' }}"
	{{ $row->is_required == 1 && $k == 0 ? 'checked' : '' }}
	>

	<label for="variation{{ $price->id.$k+$key }}">{{ $price->category->name ?? '' }}</label>
	@elseif($row->category->slug == 'checkbox_custom')
	&nbsp
	<div class="custom_checkbox variation{{ $price->id ?? '' }}">
		<input
		class="custom-control variations{{$row->id}} pricesvariations {{ $price->is_required == 1 ? 'req' : '' }}"
		data-stockstatus="{{ $price->stock_status }}"
		data-stockmanage="{{ $price->stock_manage }}"
		data-sku="{{ $price->sku }}"
		data-qty="{{ $price->qty }}"
		data-oldprice="{{ $price->old_price }}"
		data-price="{{ $price->price }}"
		type="{{ $row->select_type == 1 ? 'checkbox' : 'radio' }}"
		id="variation{{ $price->id.$k+$key }}"
		name="option[{{$row->id}}][]"
		value="{{ $price->id ?? '' }}">
		<label for="variation{{ $price->id.$k+$key }}">{{ $price->category->name ?? '' }}</label>
	</div>
	@elseif($row->category->slug == 'radio')
	&nbsp

	<input
	class="custom-control variations{{$row->id}} pricesvariations {{ $row->is_required == 1 ? 'req' : '' }}"
	data-stockstatus="{{ $price->stock_status }}"
	data-stockmanage="{{ $price->stock_manage }}"
	data-sku="{{ $price->sku }}"
	data-qty="{{ $price->qty }}"
	data-oldprice="{{ $price->old_price }}"
	data-price="{{ $price->price }}"
	type="{{ $row->select_type == 1 ? 'checkbox' : 'radio' }}"
	id="variation{{ $price->id.$k+$key }}"
	name="option[{{$row->id}}][]"
	value="{{ $price->id ?? '' }}">

	<label for="variation{{ $price->id.$k+$key }}">{{ $price->category->name ?? '' }}</label>


	@elseif($row->category->slug == 'radio_custom')
	&nbsp
	<div class="custom_radio_section variations{{$row->id}} variation{{ $price->id ?? '' }}">
		<input
		class="custom-control pricesvariations {{ $price->is_required == 1 ? 'req' : '' }}"
		data-stockstatus="{{ $price->stock_status }}"
		data-stockmanage="{{ $price->stock_manage }}"
		data-sku="{{ $price->sku }}"
		data-qty="{{ $price->qty }}"
		data-oldprice="{{ $price->old_price }}"
		data-price="{{ $price->price }}"
		type="{{ $row->select_type == 1 ? 'checkbox' : 'radio' }}"
		id="variation{{ $price->id.$k+$key }}"
		name="option[{{$row->id}}][]"
		value="{{ $price->id ?? '' }}">
		<label for="variation{{ $price->id.$k+$key }}">{{ $price->category->name ?? '' }}</label>
	</div>
	@elseif($row->category->slug == 'color_single')
	<div class="color_widget">
		<div class="single_color">
			<input class=" variations{{$row->id}} color_single pricesvariations {{ $price->is_required == 1 ? 'req' : '' }}"  data-stockstatus="{{ $price->stock_status }}"
		data-stockmanage="{{ $price->stock_manage }}"
		data-sku="{{ $price->sku }}"
		data-qty="{{ $price->qty }}"
		data-oldprice="{{ $price->old_price }}"
		data-price="{{ $price->price }}"
		type="{{ $row->select_type == 1 ? 'checkbox' : 'radio' }}"
		id="variation{{ $price->id.$k+$key }}"
		name="option[{{$row->id}}][]"
		value="{{ $price->id ?? '' }}">

		<label class="one variation{{ $price->id.$k+$key }} @if(strtolower($price->category->name ?? '') != 'white') text-light @else text-dark @endif" for="variation{{ $price->id.$k+$key }}"  style="background-color: {{ $price->category->name ?? ''; }}"><i></i></label>

		</div>

	</div>
	@elseif($row->category->slug == 'color_multi')
	<div class="color_widget">
		<div class="single_color">
			<input class=" variations{{$row->id}} color_single pricesvariations {{ $price->is_required == 1 ? 'req' : '' }}"  data-stockstatus="{{ $price->stock_status }}"
		data-stockmanage="{{ $price->stock_manage }}"
		data-sku="{{ $price->sku }}"
		data-qty="{{ $price->qty }}"
		data-oldprice="{{ $price->old_price }}"
		data-price="{{ $price->price }}"
		type="{{ $row->select_type == 1 ? 'checkbox' : 'radio' }}"
		id="variation{{ $price->id.$k+$key }}"
		name="option[{{$row->id}}][]"
		value="{{ $price->id ?? '' }}">

		<label class="one variation{{ $price->id.$k+$key }} @if(strtolower($price->category->name ?? '') != 'white') text-light @else text-dark @endif" for="variation{{ $price->id.$k+$key }}"  style="background-color: {{ $price->category->name ?? ''; }}"></label>

		</div>

	</div>
	@endif
	</div>
	@endforeach

</div>
@endforeach












{{-- < ?php $optionStock = $product->stock;
if (!empty($variation)):
    $variationLabel = getVariationLabel($variation->label_names, selectedLangId());
    if ($variation->variation_type == 'radio_button'): ?> --}}
        <input type="hidden" class="input-product-variation" data-id="variation->id" data-type="radio_button">
        <div class="col-12 col-product-variation">
            <label class="label-product-variation">variationLabel</label>
        </div>
        <div class="col-12 col-product-variation">
            {{-- < ?php $variationOptions = getProductVariationOptions($variation->id);
            if (!empty($variationOptions)):
                foreach ($variationOptions as $option):
                    if ($option->is_default != 1):
                        $optionStock = $option->stock;
                    endif;
                    $optionName = getVariationOptionName($option->option_names, selectedLangId()); ?> --}}
                    <div class="custom-control custom-control-variation custom-control-validate-input">
                        <input type="radio" name="variation< ?= $variation->id; ?>" data-name="variation< ?= $variation->id; ?>" value="< ?= $option->id; ?>" id="radio< ?= $option->id; ?>" class="custom-control-input" checked onchange="selectProductVariationOption('< ?= $variation->id; ?>', 'radio_button', $(this).val());" required>
                        {{-- < ?php if ($variation->option_display_type == 'image'):
                            $optionImage = getVariationMainOptionImageUrl($option, $productImages); ?> --}}
                            <label for="radio< ?= $option->id; ?>" data-input-name="variation< ?= $variation->id; ?>" class="custom-control-label custom-control-label-image label-variation< ?= $variation->id; ?> < ?= ($optionStock < 1) ? 'option-out-of-stock' : ''; ?>">
                                <span class="img-cnt"><img src="< ?= $optionImage; ?>" class="img-variation-option" data-toggle="tooltip" data-placement="top" title="< ?= esc($optionName); ?>" alt="< ?= esc($optionName); ?>"></span>
                            </label>
                        {{-- < ?php elseif ($variation->option_display_type == 'color'): ?> --}}
                            <label for="radio< ?= $option->id; ?>" data-input-name="variation< ?= $variation->id; ?>" class="custom-control-label label-variation-color label-variation< ?= $variation->id; ?> < ?= ($optionStock < 1) ? 'option-out-of-stock' : ''; ?>" data-toggle="tooltip" data-placement="top" title="< ?= esc($optionName); ?>">
                                <span class="variation-color-box" style="background-color: < ?= $option->color; ?>"></span>
                            </label>
                        {{-- < ?php else: ?> --}}
                            <label for="radio< ?= $option->id; ?>" data-input-name="variation< ?= $variation->id; ?>" class="custom-control-label label-variation< ?= $variation->id; ?> < ?= ($optionStock < 1) ? 'option-out-of-stock' : ''; ?>">
                                optionName
                            </label>
                        {{-- < ?php endif; ?> --}}
                    </div>
                {{-- < ?php endforeach;
            endif; ?> --}}
        </div>
    {{-- < ?php elseif ($variation->variation_type == 'dropdown'): ?> --}}
        <input type="hidden" class="input-product-variation" data-id="< ?= $variation->id; ?>" data-type="dropdown">
        <div class="col-12 col-lg-6 col-product-variation item-variation">
            <div class="form-group">
                <label class="control-label">$variationLabel</label>
                <select name="variation< ?= $variation->id; ?>" id="variation_dropdown_< ?= $variation->id; ?>" class="form-control custom-select" onchange="selectProductVariationOption('< ?= $variation->id; ?>', 'dropdown', $(this).val());" required>
                    <option value="">select</option>
                    {{-- < ?php if ($variation->parent_id == 0):
                        $variationOptions = getProductVariationOptions($variation->id);
                        if (!empty($variationOptions)):
                            foreach ($variationOptions as $option):
                                if ($option->is_default != 1):
                                    $optionStock = $option->stock;
                                endif;
                                $optionName = getVariationOptionName($option->option_names, selectedLangId()); ?> --}}
                                <option value="< ?= $option->id; ?>" <?= 2 < 1 ? 'disabled' : ''; ?> selected>optionName</option>
                            {{-- < ?php endforeach;
                        endif;
                    else: ?> --}}
                        <option value=""><?= trans("select"); ?></option>
                        {{-- < ?php $defaultOption = getVariationDefaultOption($variation->parent_id);
                        if (!empty($defaultOption)):
                            $subOptions = getVariationSubOptions($defaultOption->id);
                            if (!empty($subOptions)):
                                foreach ($subOptions as $subOption):
                                    $optionName = getVariationOptionName($subOption->option_names, selectedLangId()); ?> --}}
                                    <option value="< ?= $subOption->id; ?>">optionName</option>
                                {{-- < ?php endforeach;
                            endif;
                        endif;
                    endif; ?> --}}
                </select>
            </div>
        </div>
    {{-- < ?php elseif ($variation->variation_type == 'checkbox'): ?> --}}
        <input type="hidden" class="input-product-variation" data-id="< ?= $variation->id; ?>" data-type="checkbox">
        <div class="col-12 col-product-variation">
            <label class="label-product-variation">$variationLabel</label>
        </div>
        <div class="col-12 col-product-variation product-variation-checkbox">
            {{-- < ?php $variationOptions = getProductVariationOptions($variation->id);
            if (!empty($variationOptions)):
                foreach ($variationOptions as $option):
                    if ($option->is_default != 1):
                        $optionStock = $option->stock;
                    endif;
                    $optionName = getVariationOptionName($option->option_names, selectedLangId()); ?> --}}
                    <div class="custom-control custom-control-variation custom-control-validate-input">
                        <input type="checkbox" name="variation< ?= $variation->id; ?>[]" value="< ?= $option->id; ?>" id="checkbox< ?= $option->id; ?>" class="custom-control-input" required>
                        {{-- < ?php if ($variation->option_display_type == 'image'):
                            $optionImage = getVariationMainOptionImageUrl($option, $productImages); ?> --}}
                            <label for="checkbox< ?= $option->id; ?>" data-input-name="variation< ?= $variation->id; ?>" class="custom-control-label custom-control-label-image label-variation$variation->id <?= 2 < 1 ? 'option-out-of-stock' : ''; ?>">
                                <span class="img-cnt"><img src="< ?= $optionImage; ?>" class="img-variation-option" data-toggle="tooltip" data-placement="top" title="$optionName" alt="$optionName"></span>
                            </label>
                        {{-- < ?php elseif ($variation->option_display_type == 'color'): ?> --}}
                            <label for="checkbox$option->id" data-input-name="variation$variation->id" class="custom-control-label label-variation-color label-variation$variation->id <?= 2 < 1 ? 'option-out-of-stock' : ''; ?>" data-toggle="tooltip" data-placement="top" title="$optionName">
                                <span class="variation-color-box" style="background-color: $option->color"></span>
                            </label>
                        {{-- < ?php else: ?> --}}
                            <label for="checkbox$option->id" data-input-name="variation$variation->id" class="custom-control-label label-variation$variation->id <?= 2 < 1 ? 'option-out-of-stock' : ''; ?>">
                                $optionName
                            </label>
                        {{-- < ?php endif; ?> --}}
                    </div>
                {{-- < ?php endforeach;
            endif; ?> --}}
        </div>
    {{-- < ?php elseif ($variation->variation_type == 'text'): ?> --}}
        <div class="col-12 col-lg-6 col-product-variation item-variation">
            <div class="form-group m-b-20">
                <input type="text" name="variation$variation->id" class="form-control form-input" placeholder="$variationLabel" required>
            </div>
        </div>
    {{-- < ?php elseif ($variation->variation_type == 'number'): ?> --}}
        <div class="col-12 col-lg-6 col-product-variation item-variation">
            <div class="form-group m-b-20">
                <input type="number" name="variation$variation->id" class="form-control form-input" placeholder="$variationLabel" min="1" required>
            </div>
        </div>
    {{-- < ?php endif;
endif; ?> --}}
