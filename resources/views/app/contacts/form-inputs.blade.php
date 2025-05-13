@php $editing = isset($contact) @endphp

<div class="row">

<x-inputs.group class="col-sm-12">
        <div
            x-data="imageViewer('{{ $editing && $contact->favicon ? \Storage::url($contact->favicon) : '' }}')"
        >
            <x-inputs.partials.label
                name="favicon"
                label="Favicon"
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
                    name="favicon"
                    id="favicon"
                    @change="fileChosen"
                />
            </div>

            @error('favicon') @include('components.inputs.partials.error')
            @enderror
        </div>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="address"
            label="Address"
            :value="old('address', ($editing ? $contact->address : ''))"
            maxlength="255"
            placeholder="Address"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="phone"
            label="Phone"
            :value="old('phone', ($editing ? $contact->phone : ''))"
            maxlength="255"
            placeholder="Phone"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.email
            name="email"
            label="Email"
            :value="old('email', ($editing ? $contact->email : ''))"
            maxlength="255"
            placeholder="Email"
            required
        ></x-inputs.email>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="fax"
            label="Fax"
            :value="old('fax', ($editing ? $contact->fax : ''))"
            maxlength="255"
            placeholder="Fax"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <div
            x-data="imageViewer('{{ $editing && $contact->logo1 ? \Storage::url($contact->logo1) : '' }}')"
        >
            <x-inputs.partials.label
                name="logo1"
                label="Logo1"
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
                    name="logo1"
                    id="logo1"
                    @change="fileChosen"
                />
            </div>

            @error('logo1') @include('components.inputs.partials.error')
            @enderror
        </div>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <div
            x-data="imageViewer('{{ $editing && $contact->logo2 ? \Storage::url($contact->logo2) : '' }}')"
        >
            <x-inputs.partials.label
                name="logo2"
                label="Background2"
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
                    name="logo2"
                    id="logo2"
                    @change="fileChosen"
                />
            </div>

            @error('logo2') @include('components.inputs.partials.error')
            @enderror
        </div>
    </x-inputs.group>
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="map"
            label="Map"
            :value="old('map', ($editing ? $contact->map : ''))"
            maxlength="2048"
            placeholder="Map"
            required
        ></x-inputs.text>
    </x-inputs.group>

</div>
