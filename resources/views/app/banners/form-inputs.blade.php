@php $editing = isset($banner) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="title"
            label="Title in English"
            :value="old('title', ($editing ? $banner->title : ''))"
            maxlength="255"
            placeholder="Title"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="titleinkorea"
            label="Title in Korea"
            :value="old('title', ($editing ? $banner->titleinkorea : ''))"
            maxlength="255"
            placeholder="Title"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <div
            x-data="imageViewer('{{ $editing && $banner->images ? \Storage::url($banner->images) : '' }}')"
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
</div>
