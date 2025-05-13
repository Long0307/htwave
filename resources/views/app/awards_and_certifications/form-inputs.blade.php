@php $editing = isset($awardsAndCertification) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <div
            x-data="imageViewer('{{ $editing && $awardsAndCertification->images ? \Storage::url($awardsAndCertification->images) : '' }}')"
        >
            <x-inputs.partials.label
                name="images"
                label="Images"
            ></x-inputs.partials.label
            ><br />

            <!-- Show the image -->
            <template x-if="imageUrl">
                <img
                    :src="imageUrl"
                    class="object-cover rounded border border-gray-200"
                    style="width: 100px; height: 100px;"
                />
            </template>

            <!-- Show the gray box when image is not available -->
            <template x-if="!imageUrl">
                <div
                    class="border rounded border-gray-200 bg-gray-100"
                    style="width: 100px; height: 100px;"
                ></div>
            </template>

            <div class="mt-2">
                <input
                    type="file"
                    name="images"
                    id="images"
                    @change="fileChosen"
                />
            </div>

            @error('images') @include('components.inputs.partials.error')
            @enderror
        </div>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="title"
            label="Title"
            :value="old('title', ($editing ? $awardsAndCertification->title : ''))"
            maxlength="255"
            placeholder="Title"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="description"
            id="description"
            label="Description 2"
            maxlength="2048"
            >{{ old('description', ($editing ? $awardsAndCertification->description : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="link"
            label="Link"
            :value="old('link', ($editing ? $awardsAndCertification->link : ''))"
            maxlength="255"
            placeholder="Link"
            required
        ></x-inputs.text>
    </x-inputs.group>
     <!-- <script src="{{asset('template/ckeditor/ckeditor.js')}}"></script> -->
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
