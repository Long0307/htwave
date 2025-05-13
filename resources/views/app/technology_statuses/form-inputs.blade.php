@php $editing = isset($technologyStatus) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="title"
            label="Title"
            :value="old('title', ($editing ? $technologyStatus->title : ''))"
            maxlength="255"
            placeholder="Title"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="description"
            label="Description"
            id="description"
            maxlength="255"
            placeholder="Description"
            required
        >{{ old('description', ($editing ? $technologyStatus->description : ''))
        }}</x-inputs.textarea>
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
    });

    </script>
</div>
