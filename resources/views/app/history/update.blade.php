@php $editing = isset($technologyCategory) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="year"
            label="Year"
            value="{{ $history->year }}"
            maxlength="255"
            placeholder="Year"
            required
        ></x-inputs.text>
    </x-inputs.group>
    
    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="description"
            id="description"
            label="Description"
            maxlength="2024"
            >{{ $history->description }}</x-inputs.textarea
        >
    </x-inputs.group>

    <script src="https://cdn.ckeditor.com/4.9.2/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');

        document.addEventListener("DOMContentLoaded", function() {
        // Lấy tất cả các thẻ form trên trang
        var forms = document.getElementsByTagName('form');
        
        // Duyệt qua tất cả các thẻ form và thêm thuộc tính enctype
        for (var i = 0; i < forms.length; i++) {
            forms[i].setAttribute('enctype', 'multipart/form-data');
        }
    })
    </script>
</div>
