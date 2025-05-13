@php $editing = isset($inquiry) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Name"
            :value="old('name', ($editing ? $inquiry->name : ''))"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.email
            name="email"
            label="Email"
            :value="old('email', ($editing ? $inquiry->email : ''))"
            maxlength="255"
            placeholder="Email"
            required
        ></x-inputs.email>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="phoneNumber"
            label="Phone Number"
            :value="old('phoneNumber', ($editing ? $inquiry->phoneNumber : ''))"
            maxlength="255"
            placeholder="Phone Number"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="enquiries"
            label="Enquiries"
            :value="old('enquiries', ($editing ? $inquiry->enquiries : ''))"
            maxlength="255"
            placeholder="Enquiries"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <div class="form-group col-sm-12">
        <label for="">Respond</label>
        @php
            $url = request()->fullUrl();  // Lấy URL hiện tại
            $parts = explode('/', $url);  // Tách chuỗi
            $lastPart = end($parts);  // Lấy phần tử cuối cùng    
        @endphp
        @if ($lastPart == 'edit')
        <div class="form-check">
            <input class="form-check-input" type="radio" name="respond" value="0" id="flexRadioDefault1"
            @if($inquiry->respond == 0)
                checked value="0"
            @else
            @endif>
            <label class="form-check-label" for="flexRadioDefault1">
                Not Responded
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="respond" value="1" id="flexRadioDefault2" 
            @if($inquiry->respond == 1)
                checked value="1"
            @else
            @endif>
            <label class="form-check-label" for="flexRadioDefault2">
                Responded
            </label>
        </div>
        @else
        @endif
    </div>
</div>
