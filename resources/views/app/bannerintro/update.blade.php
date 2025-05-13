@php $editing = isset($banner) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="slogan"
            label="Slogan"
            value="{{ $bannerintro->slogan }}"
            maxlength="255"
            placeholder="Slogan"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <div
            x-data="imageViewer('{{ $editing && $bannerintro->images ? \Storage::url($bannerintro->images) : '' }}')"
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
