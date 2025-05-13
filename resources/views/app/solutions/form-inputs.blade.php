@php $editing = isset($solution) @endphp
<style>
/* Điều chỉnh chiều cao của vùng nội dung */
    .ck-editor__editable_inline {
        min-height: 200px; /* Chiều cao tối thiểu */
        max-height: 400px; /* Chiều cao tối đa */
    }

    /* Điều chỉnh chiều rộng của vùng nội dung */
    .ck-editor__main > .ck-editor__editable {
        max-width: 100%; /* Chiều rộng tối đa */
        width: 100%; /* Chiều rộng 100% của khung chứa */
    }
</style>
<div class="row">
    <x-inputs.group class="col-sm-12">
        <div
            x-data="imageViewer('{{ $editing && $solution->Background1 ? \Storage::url($solution->Background1) : '' }}')"
        >
            <x-inputs.partials.label
                name="Background1"
                label="Background1"
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
                    name="Background1"
                    id="Background1"
                    @change="fileChosen"
                />
            </div>

            @error('Background1') @include('components.inputs.partials.error')
            @enderror
        </div>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="Slogan"
            label="Slogan"
            :value="old('Slogan', ($editing ? $solution->Slogan : ''))"
            maxlength="255"
            placeholder="Slogan"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <div
            x-data="imageViewer('{{ $editing && $solution->Background2 ? \Storage::url($solution->Background2) : '' }}')"
        >
            <x-inputs.partials.label
                name="Background2"
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
                    name="Background2"
                    id="Background2"
                    @change="fileChosen"
                />
            </div>

            @error('Background2') @include('components.inputs.partials.error')
            @enderror
        </div>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <div
            x-data="imageViewer('{{ $editing && $solution->background3 ? \Storage::url($solution->background3) : '' }}')"
        >
            <x-inputs.partials.label
                name="background3"
                label="Show on home page"
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
                    name="background3"
                    id="background3"
                    @change="fileChosen"
                />
            </div>

            @error('background3') @include('components.inputs.partials.error')
            @enderror
        </div>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="Title"
            label="Title"
            :value="old('Title', ($editing ? $solution->Title : ''))"
            maxlength="255"
            placeholder="Title"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="Description"
            label="Description"
            maxlength="255"
            required
            >{{ old('Description', ($editing ? $solution->Description : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <!-- từ đây  -->

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="Solution1"
            id="Solution1"
            label="Solution 1"
            maxlength="255"
            rows
            >{{ old('Solution1', ($editing ? $solution->Solution1 : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="Solution2"
            id="Solution2"
            label="Solution 2"
            maxlength="255"
            >{{ old('Solution2', ($editing ? $solution->Solution2 : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="Solution3"
            id="Solution3"
            label="Solution 3"
            maxlength="255"
            >{{ old('Solution3', ($editing ? $solution->Solution3 : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="Solution4"
            id="Solution4"
            label="Solution 4"
            maxlength="255"
            >{{ old('Solution4', ($editing ? $solution->Solution4 : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="Solution5"
            id="Solution5"
            label="Solution 5"
            maxlength="255"
            >{{ old('Solution5', ($editing ? $solution->Solution5 : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="Solution6"
            id="Solution6"
            label="Solution 6"
            maxlength="255"
            >{{ old('Solution6', ($editing ? $solution->Solution6 : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="Solution7"
            id="Solution7"
            label="Solution 7"
            maxlength="255"
            >{{ old('Solution7', ($editing ? $solution->Solution7 : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="Solution8"
            id="Solution8"
            label="Solution 8"
            maxlength="255"
            >{{ old('Solution8', ($editing ? $solution->Solution8 : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="Solution9"
            id="Solution9"
            label="Solution 9"
            maxlength="255"
            >{{ old('Solution9', ($editing ? $solution->Solution9 : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="Solution10"
            id="Solution10"
            label="Solution 10"
            maxlength="255"
            >{{ old('Solution10', ($editing ? $solution->Solution10 : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="Solution11"
            id="Solution11"
            label="Solution 11"
            maxlength="255"
            >{{ old('Solution11', ($editing ? $solution->Solution11 : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="Solution12"
            id="Solution12"
            label="Solution 12"
            maxlength="255"
            >{{ old('Solution12', ($editing ? $solution->Solution12 : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="Solution13"
            id="Solution13"
            label="Solution 13"
            maxlength="255"
            >{{ old('Solution13', ($editing ? $solution->Solution13 : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="Solution14"
            id="Solution14"
            label="Solution 14"
            maxlength="255"
            >{{ old('Solution14', ($editing ? $solution->Solution14 : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="Solution15"
            id="Solution15"
            label="Solution 15"
            maxlength="255"
            >{{ old('Solution15', ($editing ? $solution->Solution15: ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="Solution16"
            id="Solution16"
            label="Solution 16"
            maxlength="255"
            >{{ old('Solution16', ($editing ? $solution->Solution16 : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="Solution17"
            id="Solution17"
            label="Solution 17"
            maxlength="255"
            >{{ old('Solution17', ($editing ? $solution->Solution17 : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="Solution18"
            id="Solution18"
            label="Solution 18"
            maxlength="255"
            >{{ old('Solution18', ($editing ? $solution->Solution18 : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="Solution19"
            id="Solution19"
            label="Solution 19"
            maxlength="255"
            >{{ old('Solution19', ($editing ? $solution->Solution19 : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="Solution20"
            id="Solution20"
            label="Solution 20"
            maxlength="255"
            >{{ old('Solution20', ($editing ? $solution->Solution20 : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>
    

    <!-- <script src="{{asset('template/ckeditor/ckeditor.js')}}"></script> -->
    <script src="https://cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script>
    <script>

var editor = CKEDITOR.replace('Solution1', {
        extraPlugins: 'uploadimage',
        filebrowserImageUploadUrl: "{{ route('ckeditor.upload') }}?_token={{ csrf_token() }}", // Địa chỉ upload ảnh
        filebrowserUploadMethod: 'form',
        height: 300,
    });

    CKEDITOR.config.removeDialogTabs = '';  // Đảm bảo không ẩn tab Upload

    editor.on('instanceReady', function() {
        console.log('Editor is ready!');
    });

    // Sự kiện 'dialogDefinition' để can thiệp vào các dialog (chỉ can thiệp vào tab Upload trong dialog image)
    CKEDITOR.on('dialogDefinition', function(ev) {
        var dialogName = ev.data.name;
        var dialogDefinition = ev.data.definition;

        if (dialogName === 'image') {
            var uploadTab = dialogDefinition.getContents('Upload');
            if (uploadTab && uploadTab.elements) {
                var uploadButton = uploadTab.get('uploadButton');

                // Kiểm tra và thao tác với nút upload
                if (uploadButton && uploadButton.onClick) {
                    var originalOnClick = uploadButton.onClick;
                    uploadButton.onClick = function(evt) {
                        console.log("vào đây chưa");
                        var inputs = document.querySelectorAll('.cke_dialog_ui_input_file');
                        inputs.forEach(function(input) {
                            input.style.height = '200px';
                        });
                        var inputs = document.querySelectorAll('.cke_dialog_ui_button');
                        inputs.forEach(function(input) {
                            input.style.margin = '116px 0 0 0';
                        });
                        var inputs = document.querySelectorAll('.cke_dialog_footer');
                        inputs.forEach(function(input) {
                            input.style.borderTop = 'none';
                        });
                    };
                }
            }
        }
    });

var editor = CKEDITOR.replace('Solution2', {
    extraPlugins: 'uploadimage',
    filebrowserImageUploadUrl: "{{ route('ckeditor.upload') }}?_token={{ csrf_token() }}", // Địa chỉ upload ảnh
    filebrowserUploadMethod: 'form',
    height: 300,
});

CKEDITOR.config.removeDialogTabs = '';  // Đảm bảo không ẩn tab Upload

editor.on('instanceReady', function() {
    console.log('Editor is ready!');
});

// Sự kiện 'dialogDefinition' để can thiệp vào các dialog (chỉ can thiệp vào tab Upload trong dialog image)
CKEDITOR.on('dialogDefinition', function(ev) {
    var dialogName = ev.data.name;
    var dialogDefinition = ev.data.definition;

    if (dialogName === 'image') {
        var uploadTab = dialogDefinition.getContents('Upload');
        if (uploadTab && uploadTab.elements) {
            var uploadButton = uploadTab.get('uploadButton');

            // Kiểm tra và thao tác với nút upload
            if (uploadButton && uploadButton.onClick) {
                var originalOnClick = uploadButton.onClick;
                uploadButton.onClick = function(evt) {
                    console.log("vào đây chưa");
                    var inputs = document.querySelectorAll('.cke_dialog_ui_input_file');
                    inputs.forEach(function(input) {
                        input.style.height = '200px';
                    });
                    var inputs = document.querySelectorAll('.cke_dialog_ui_button');
                    inputs.forEach(function(input) {
                        input.style.margin = '116px 0 0 0';
                    });
                    var inputs = document.querySelectorAll('.cke_dialog_footer');
                    inputs.forEach(function(input) {
                        input.style.borderTop = 'none';
                    });
                };
            }
        }
    }
});

var editor = CKEDITOR.replace('Solution3', {
    extraPlugins: 'uploadimage',
    filebrowserImageUploadUrl: "{{ route('ckeditor.upload') }}?_token={{ csrf_token() }}", // Địa chỉ upload ảnh
    filebrowserUploadMethod: 'form',
    height: 300,
});

CKEDITOR.config.removeDialogTabs = '';  // Đảm bảo không ẩn tab Upload

editor.on('instanceReady', function() {
    console.log('Editor is ready!');
});

// Sự kiện 'dialogDefinition' để can thiệp vào các dialog (chỉ can thiệp vào tab Upload trong dialog image)
CKEDITOR.on('dialogDefinition', function(ev) {
    var dialogName = ev.data.name;
    var dialogDefinition = ev.data.definition;

    if (dialogName === 'image') {
        var uploadTab = dialogDefinition.getContents('Upload');
        if (uploadTab && uploadTab.elements) {
            var uploadButton = uploadTab.get('uploadButton');

            // Kiểm tra và thao tác với nút upload
            if (uploadButton && uploadButton.onClick) {
                var originalOnClick = uploadButton.onClick;
                uploadButton.onClick = function(evt) {
                    console.log("vào đây chưa");
                    var inputs = document.querySelectorAll('.cke_dialog_ui_input_file');
                    inputs.forEach(function(input) {
                        input.style.height = '200px';
                    });
                    var inputs = document.querySelectorAll('.cke_dialog_ui_button');
                    inputs.forEach(function(input) {
                        input.style.margin = '116px 0 0 0';
                    });
                    var inputs = document.querySelectorAll('.cke_dialog_footer');
                    inputs.forEach(function(input) {
                        input.style.borderTop = 'none';
                    });
                };
            }
        }
    }
});

var editor = CKEDITOR.replace('Solution4', {
    extraPlugins: 'uploadimage',
    filebrowserImageUploadUrl: "{{ route('ckeditor.upload') }}?_token={{ csrf_token() }}", // Địa chỉ upload ảnh
    filebrowserUploadMethod: 'form',
    height: 300,
});

CKEDITOR.config.removeDialogTabs = '';  // Đảm bảo không ẩn tab Upload

editor.on('instanceReady', function() {
    console.log('Editor is ready!');
});

// Sự kiện 'dialogDefinition' để can thiệp vào các dialog (chỉ can thiệp vào tab Upload trong dialog image)
CKEDITOR.on('dialogDefinition', function(ev) {
    var dialogName = ev.data.name;
    var dialogDefinition = ev.data.definition;

    if (dialogName === 'image') {
        var uploadTab = dialogDefinition.getContents('Upload');
        if (uploadTab && uploadTab.elements) {
            var uploadButton = uploadTab.get('uploadButton');

            // Kiểm tra và thao tác với nút upload
            if (uploadButton && uploadButton.onClick) {
                var originalOnClick = uploadButton.onClick;
                uploadButton.onClick = function(evt) {
                    console.log("vào đây chưa");
                    var inputs = document.querySelectorAll('.cke_dialog_ui_input_file');
                    inputs.forEach(function(input) {
                        input.style.height = '200px';
                    });
                    var inputs = document.querySelectorAll('.cke_dialog_ui_button');
                    inputs.forEach(function(input) {
                        input.style.margin = '116px 0 0 0';
                    });
                    var inputs = document.querySelectorAll('.cke_dialog_footer');
                    inputs.forEach(function(input) {
                        input.style.borderTop = 'none';
                    });
                };
            }
        }
    }
});

var editor = CKEDITOR.replace('Solution5', {
    extraPlugins: 'uploadimage',
    filebrowserImageUploadUrl: "{{ route('ckeditor.upload') }}?_token={{ csrf_token() }}", // Địa chỉ upload ảnh
    filebrowserUploadMethod: 'form',
    height: 300,
});

CKEDITOR.config.removeDialogTabs = '';  // Đảm bảo không ẩn tab Upload

editor.on('instanceReady', function() {
    console.log('Editor is ready!');
});

// Sự kiện 'dialogDefinition' để can thiệp vào các dialog (chỉ can thiệp vào tab Upload trong dialog image)
CKEDITOR.on('dialogDefinition', function(ev) {
    var dialogName = ev.data.name;
    var dialogDefinition = ev.data.definition;

    if (dialogName === 'image') {
        var uploadTab = dialogDefinition.getContents('Upload');
        if (uploadTab && uploadTab.elements) {
            var uploadButton = uploadTab.get('uploadButton');

            // Kiểm tra và thao tác với nút upload
            if (uploadButton && uploadButton.onClick) {
                var originalOnClick = uploadButton.onClick;
                uploadButton.onClick = function(evt) {
                    console.log("vào đây chưa");
                    var inputs = document.querySelectorAll('.cke_dialog_ui_input_file');
                    inputs.forEach(function(input) {
                        input.style.height = '200px';
                    });
                    var inputs = document.querySelectorAll('.cke_dialog_ui_button');
                    inputs.forEach(function(input) {
                        input.style.margin = '116px 0 0 0';
                    });
                    var inputs = document.querySelectorAll('.cke_dialog_footer');
                    inputs.forEach(function(input) {
                        input.style.borderTop = 'none';
                    });
                };
            }
        }
    }
});

var editor = CKEDITOR.replace('Solution6', {
    extraPlugins: 'uploadimage',
    filebrowserImageUploadUrl: "{{ route('ckeditor.upload') }}?_token={{ csrf_token() }}", // Địa chỉ upload ảnh
    filebrowserUploadMethod: 'form',
    height: 300,
});

CKEDITOR.config.removeDialogTabs = '';  // Đảm bảo không ẩn tab Upload

editor.on('instanceReady', function() {
    console.log('Editor is ready!');
});

// Sự kiện 'dialogDefinition' để can thiệp vào các dialog (chỉ can thiệp vào tab Upload trong dialog image)
CKEDITOR.on('dialogDefinition', function(ev) {
    var dialogName = ev.data.name;
    var dialogDefinition = ev.data.definition;

    if (dialogName === 'image') {
        var uploadTab = dialogDefinition.getContents('Upload');
        if (uploadTab && uploadTab.elements) {
            var uploadButton = uploadTab.get('uploadButton');

            // Kiểm tra và thao tác với nút upload
            if (uploadButton && uploadButton.onClick) {
                var originalOnClick = uploadButton.onClick;
                uploadButton.onClick = function(evt) {
                    console.log("vào đây chưa");
                    var inputs = document.querySelectorAll('.cke_dialog_ui_input_file');
                    inputs.forEach(function(input) {
                        input.style.height = '200px';
                    });
                    var inputs = document.querySelectorAll('.cke_dialog_ui_button');
                    inputs.forEach(function(input) {
                        input.style.margin = '116px 0 0 0';
                    });
                    var inputs = document.querySelectorAll('.cke_dialog_footer');
                    inputs.forEach(function(input) {
                        input.style.borderTop = 'none';
                    });
                };
            }
        }
    }
});

var editor = CKEDITOR.replace('Solution7', {
    extraPlugins: 'uploadimage',
    filebrowserImageUploadUrl: "{{ route('ckeditor.upload') }}?_token={{ csrf_token() }}", // Địa chỉ upload ảnh
    filebrowserUploadMethod: 'form',
    height: 300,
});

CKEDITOR.config.removeDialogTabs = '';  // Đảm bảo không ẩn tab Upload

editor.on('instanceReady', function() {
    console.log('Editor is ready!');
});

// Sự kiện 'dialogDefinition' để can thiệp vào các dialog (chỉ can thiệp vào tab Upload trong dialog image)
CKEDITOR.on('dialogDefinition', function(ev) {
    var dialogName = ev.data.name;
    var dialogDefinition = ev.data.definition;

    if (dialogName === 'image') {
        var uploadTab = dialogDefinition.getContents('Upload');
        if (uploadTab && uploadTab.elements) {
            var uploadButton = uploadTab.get('uploadButton');

            // Kiểm tra và thao tác với nút upload
            if (uploadButton && uploadButton.onClick) {
                var originalOnClick = uploadButton.onClick;
                uploadButton.onClick = function(evt) {
                    console.log("vào đây chưa");
                    var inputs = document.querySelectorAll('.cke_dialog_ui_input_file');
                    inputs.forEach(function(input) {
                        input.style.height = '200px';
                    });
                    var inputs = document.querySelectorAll('.cke_dialog_ui_button');
                    inputs.forEach(function(input) {
                        input.style.margin = '116px 0 0 0';
                    });
                    var inputs = document.querySelectorAll('.cke_dialog_footer');
                    inputs.forEach(function(input) {
                        input.style.borderTop = 'none';
                    });
                };
            }
        }
    }
});

var editor = CKEDITOR.replace('Solution8', {
    extraPlugins: 'uploadimage',
    filebrowserImageUploadUrl: "{{ route('ckeditor.upload') }}?_token={{ csrf_token() }}", // Địa chỉ upload ảnh
    filebrowserUploadMethod: 'form',
    height: 300,
});

CKEDITOR.config.removeDialogTabs = '';  // Đảm bảo không ẩn tab Upload

editor.on('instanceReady', function() {
    console.log('Editor is ready!');
});

// Sự kiện 'dialogDefinition' để can thiệp vào các dialog (chỉ can thiệp vào tab Upload trong dialog image)
CKEDITOR.on('dialogDefinition', function(ev) {
    var dialogName = ev.data.name;
    var dialogDefinition = ev.data.definition;

    if (dialogName === 'image') {
        var uploadTab = dialogDefinition.getContents('Upload');
        if (uploadTab && uploadTab.elements) {
            var uploadButton = uploadTab.get('uploadButton');

            // Kiểm tra và thao tác với nút upload
            if (uploadButton && uploadButton.onClick) {
                var originalOnClick = uploadButton.onClick;
                uploadButton.onClick = function(evt) {
                    console.log("vào đây chưa");
                    var inputs = document.querySelectorAll('.cke_dialog_ui_input_file');
                    inputs.forEach(function(input) {
                        input.style.height = '200px';
                    });
                    var inputs = document.querySelectorAll('.cke_dialog_ui_button');
                    inputs.forEach(function(input) {
                        input.style.margin = '116px 0 0 0';
                    });
                    var inputs = document.querySelectorAll('.cke_dialog_footer');
                    inputs.forEach(function(input) {
                        input.style.borderTop = 'none';
                    });
                };
            }
        }
    }
});

var editor = CKEDITOR.replace('Solution9', {
    extraPlugins: 'uploadimage',
    filebrowserImageUploadUrl: "{{ route('ckeditor.upload') }}?_token={{ csrf_token() }}", // Địa chỉ upload ảnh
    filebrowserUploadMethod: 'form',
    height: 300,
});

CKEDITOR.config.removeDialogTabs = '';  // Đảm bảo không ẩn tab Upload

editor.on('instanceReady', function() {
    console.log('Editor is ready!');
});

// Sự kiện 'dialogDefinition' để can thiệp vào các dialog (chỉ can thiệp vào tab Upload trong dialog image)
CKEDITOR.on('dialogDefinition', function(ev) {
    var dialogName = ev.data.name;
    var dialogDefinition = ev.data.definition;

    if (dialogName === 'image') {
        var uploadTab = dialogDefinition.getContents('Upload');
        if (uploadTab && uploadTab.elements) {
            var uploadButton = uploadTab.get('uploadButton');

            // Kiểm tra và thao tác với nút upload
            if (uploadButton && uploadButton.onClick) {
                var originalOnClick = uploadButton.onClick;
                uploadButton.onClick = function(evt) {
                    console.log("vào đây chưa");
                    var inputs = document.querySelectorAll('.cke_dialog_ui_input_file');
                    inputs.forEach(function(input) {
                        input.style.height = '200px';
                    });
                    var inputs = document.querySelectorAll('.cke_dialog_ui_button');
                    inputs.forEach(function(input) {
                        input.style.margin = '116px 0 0 0';
                    });
                    var inputs = document.querySelectorAll('.cke_dialog_footer');
                    inputs.forEach(function(input) {
                        input.style.borderTop = 'none';
                    });
                };
            }
        }
    }
});

var editor = CKEDITOR.replace('Solution10', {
    extraPlugins: 'uploadimage',
    filebrowserImageUploadUrl: "{{ route('ckeditor.upload') }}?_token={{ csrf_token() }}", // Địa chỉ upload ảnh
    filebrowserUploadMethod: 'form',
    height: 300,
});

CKEDITOR.config.removeDialogTabs = '';  // Đảm bảo không ẩn tab Upload

editor.on('instanceReady', function() {
    console.log('Editor is ready!');
});

// Sự kiện 'dialogDefinition' để can thiệp vào các dialog (chỉ can thiệp vào tab Upload trong dialog image)
CKEDITOR.on('dialogDefinition', function(ev) {
    var dialogName = ev.data.name;
    var dialogDefinition = ev.data.definition;

    if (dialogName === 'image') {
        var uploadTab = dialogDefinition.getContents('Upload');
        if (uploadTab && uploadTab.elements) {
            var uploadButton = uploadTab.get('uploadButton');

            // Kiểm tra và thao tác với nút upload
            if (uploadButton && uploadButton.onClick) {
                var originalOnClick = uploadButton.onClick;
                uploadButton.onClick = function(evt) {
                    console.log("vào đây chưa");
                    var inputs = document.querySelectorAll('.cke_dialog_ui_input_file');
                    inputs.forEach(function(input) {
                        input.style.height = '200px';
                    });
                    var inputs = document.querySelectorAll('.cke_dialog_ui_button');
                    inputs.forEach(function(input) {
                        input.style.margin = '116px 0 0 0';
                    });
                    var inputs = document.querySelectorAll('.cke_dialog_footer');
                    inputs.forEach(function(input) {
                        input.style.borderTop = 'none';
                    });
                };
            }
        }
    }
});

var editor = CKEDITOR.replace('Solution11', {
    extraPlugins: 'uploadimage',
    filebrowserImageUploadUrl: "{{ route('ckeditor.upload') }}?_token={{ csrf_token() }}", // Địa chỉ upload ảnh
    filebrowserUploadMethod: 'form',
    height: 300,
});

CKEDITOR.config.removeDialogTabs = '';  // Đảm bảo không ẩn tab Upload

editor.on('instanceReady', function() {
    console.log('Editor is ready!');
});

// Sự kiện 'dialogDefinition' để can thiệp vào các dialog (chỉ can thiệp vào tab Upload trong dialog image)
CKEDITOR.on('dialogDefinition', function(ev) {
    var dialogName = ev.data.name;
    var dialogDefinition = ev.data.definition;

    if (dialogName === 'image') {
        var uploadTab = dialogDefinition.getContents('Upload');
        if (uploadTab && uploadTab.elements) {
            var uploadButton = uploadTab.get('uploadButton');

            // Kiểm tra và thao tác với nút upload
            if (uploadButton && uploadButton.onClick) {
                var originalOnClick = uploadButton.onClick;
                uploadButton.onClick = function(evt) {
                    console.log("vào đây chưa");
                    var inputs = document.querySelectorAll('.cke_dialog_ui_input_file');
                    inputs.forEach(function(input) {
                        input.style.height = '200px';
                    });
                    var inputs = document.querySelectorAll('.cke_dialog_ui_button');
                    inputs.forEach(function(input) {
                        input.style.margin = '116px 0 0 0';
                    });
                    var inputs = document.querySelectorAll('.cke_dialog_footer');
                    inputs.forEach(function(input) {
                        input.style.borderTop = 'none';
                    });
                };
            }
        }
    }
});

var editor = CKEDITOR.replace('Solution12', {
    extraPlugins: 'uploadimage',
    filebrowserImageUploadUrl: "{{ route('ckeditor.upload') }}?_token={{ csrf_token() }}", // Địa chỉ upload ảnh
    filebrowserUploadMethod: 'form',
    height: 300,
});

CKEDITOR.config.removeDialogTabs = '';  // Đảm bảo không ẩn tab Upload

editor.on('instanceReady', function() {
    console.log('Editor is ready!');
});

// Sự kiện 'dialogDefinition' để can thiệp vào các dialog (chỉ can thiệp vào tab Upload trong dialog image)
CKEDITOR.on('dialogDefinition', function(ev) {
    var dialogName = ev.data.name;
    var dialogDefinition = ev.data.definition;

    if (dialogName === 'image') {
        var uploadTab = dialogDefinition.getContents('Upload');
        if (uploadTab && uploadTab.elements) {
            var uploadButton = uploadTab.get('uploadButton');

            // Kiểm tra và thao tác với nút upload
            if (uploadButton && uploadButton.onClick) {
                var originalOnClick = uploadButton.onClick;
                uploadButton.onClick = function(evt) {
                    console.log("vào đây chưa");
                    var inputs = document.querySelectorAll('.cke_dialog_ui_input_file');
                    inputs.forEach(function(input) {
                        input.style.height = '200px';
                    });
                    var inputs = document.querySelectorAll('.cke_dialog_ui_button');
                    inputs.forEach(function(input) {
                        input.style.margin = '116px 0 0 0';
                    });
                    var inputs = document.querySelectorAll('.cke_dialog_footer');
                    inputs.forEach(function(input) {
                        input.style.borderTop = 'none';
                    });
                };
            }
        }
    }
});

var editor = CKEDITOR.replace('Solution13', {
    extraPlugins: 'uploadimage',
    filebrowserImageUploadUrl: "{{ route('ckeditor.upload') }}?_token={{ csrf_token() }}", // Địa chỉ upload ảnh
    filebrowserUploadMethod: 'form',
    height: 300,
});

CKEDITOR.config.removeDialogTabs = '';  // Đảm bảo không ẩn tab Upload

editor.on('instanceReady', function() {
    console.log('Editor is ready!');
});

// Sự kiện 'dialogDefinition' để can thiệp vào các dialog (chỉ can thiệp vào tab Upload trong dialog image)
CKEDITOR.on('dialogDefinition', function(ev) {
    var dialogName = ev.data.name;
    var dialogDefinition = ev.data.definition;

    if (dialogName === 'image') {
        var uploadTab = dialogDefinition.getContents('Upload');
        if (uploadTab && uploadTab.elements) {
            var uploadButton = uploadTab.get('uploadButton');

            // Kiểm tra và thao tác với nút upload
            if (uploadButton && uploadButton.onClick) {
                var originalOnClick = uploadButton.onClick;
                uploadButton.onClick = function(evt) {
                    console.log("vào đây chưa");
                    var inputs = document.querySelectorAll('.cke_dialog_ui_input_file');
                    inputs.forEach(function(input) {
                        input.style.height = '200px';
                    });
                    var inputs = document.querySelectorAll('.cke_dialog_ui_button');
                    inputs.forEach(function(input) {
                        input.style.margin = '116px 0 0 0';
                    });
                    var inputs = document.querySelectorAll('.cke_dialog_footer');
                    inputs.forEach(function(input) {
                        input.style.borderTop = 'none';
                    });
                };
            }
        }
    }
});

var editor = CKEDITOR.replace('Solution14', {
    extraPlugins: 'uploadimage',
    filebrowserImageUploadUrl: "{{ route('ckeditor.upload') }}?_token={{ csrf_token() }}", // Địa chỉ upload ảnh
    filebrowserUploadMethod: 'form',
    height: 300,
});

CKEDITOR.config.removeDialogTabs = '';  // Đảm bảo không ẩn tab Upload

editor.on('instanceReady', function() {
    console.log('Editor is ready!');
});

// Sự kiện 'dialogDefinition' để can thiệp vào các dialog (chỉ can thiệp vào tab Upload trong dialog image)
CKEDITOR.on('dialogDefinition', function(ev) {
    var dialogName = ev.data.name;
    var dialogDefinition = ev.data.definition;

    if (dialogName === 'image') {
        var uploadTab = dialogDefinition.getContents('Upload');
        if (uploadTab && uploadTab.elements) {
            var uploadButton = uploadTab.get('uploadButton');

            // Kiểm tra và thao tác với nút upload
            if (uploadButton && uploadButton.onClick) {
                var originalOnClick = uploadButton.onClick;
                uploadButton.onClick = function(evt) {
                    console.log("vào đây chưa");
                    var inputs = document.querySelectorAll('.cke_dialog_ui_input_file');
                    inputs.forEach(function(input) {
                        input.style.height = '200px';
                    });
                    var inputs = document.querySelectorAll('.cke_dialog_ui_button');
                    inputs.forEach(function(input) {
                        input.style.margin = '116px 0 0 0';
                    });
                    var inputs = document.querySelectorAll('.cke_dialog_footer');
                    inputs.forEach(function(input) {
                        input.style.borderTop = 'none';
                    });
                };
            }
        }
    }
});

var editor = CKEDITOR.replace('Solution15', {
    extraPlugins: 'uploadimage',
    filebrowserImageUploadUrl: "{{ route('ckeditor.upload') }}?_token={{ csrf_token() }}", // Địa chỉ upload ảnh
    filebrowserUploadMethod: 'form',
    height: 300,
});

CKEDITOR.config.removeDialogTabs = '';  // Đảm bảo không ẩn tab Upload

editor.on('instanceReady', function() {
    console.log('Editor is ready!');
});

// Sự kiện 'dialogDefinition' để can thiệp vào các dialog (chỉ can thiệp vào tab Upload trong dialog image)
CKEDITOR.on('dialogDefinition', function(ev) {
    var dialogName = ev.data.name;
    var dialogDefinition = ev.data.definition;

    if (dialogName === 'image') {
        var uploadTab = dialogDefinition.getContents('Upload');
        if (uploadTab && uploadTab.elements) {
            var uploadButton = uploadTab.get('uploadButton');

            // Kiểm tra và thao tác với nút upload
            if (uploadButton && uploadButton.onClick) {
                var originalOnClick = uploadButton.onClick;
                uploadButton.onClick = function(evt) {
                    console.log("vào đây chưa");
                    var inputs = document.querySelectorAll('.cke_dialog_ui_input_file');
                    inputs.forEach(function(input) {
                        input.style.height = '200px';
                    });
                    var inputs = document.querySelectorAll('.cke_dialog_ui_button');
                    inputs.forEach(function(input) {
                        input.style.margin = '116px 0 0 0';
                    });
                    var inputs = document.querySelectorAll('.cke_dialog_footer');
                    inputs.forEach(function(input) {
                        input.style.borderTop = 'none';
                    });
                };
            }
        }
    }
});

var editor = CKEDITOR.replace('Solution16', {
    extraPlugins: 'uploadimage',
    filebrowserImageUploadUrl: "{{ route('ckeditor.upload') }}?_token={{ csrf_token() }}", // Địa chỉ upload ảnh
    filebrowserUploadMethod: 'form',
    height: 300,
});

CKEDITOR.config.removeDialogTabs = '';  // Đảm bảo không ẩn tab Upload

editor.on('instanceReady', function() {
    console.log('Editor is ready!');
});

// Sự kiện 'dialogDefinition' để can thiệp vào các dialog (chỉ can thiệp vào tab Upload trong dialog image)
CKEDITOR.on('dialogDefinition', function(ev) {
    var dialogName = ev.data.name;
    var dialogDefinition = ev.data.definition;

    if (dialogName === 'image') {
        var uploadTab = dialogDefinition.getContents('Upload');
        if (uploadTab && uploadTab.elements) {
            var uploadButton = uploadTab.get('uploadButton');

            // Kiểm tra và thao tác với nút upload
            if (uploadButton && uploadButton.onClick) {
                var originalOnClick = uploadButton.onClick;
                uploadButton.onClick = function(evt) {
                    console.log("vào đây chưa");
                    var inputs = document.querySelectorAll('.cke_dialog_ui_input_file');
                    inputs.forEach(function(input) {
                        input.style.height = '200px';
                    });
                    var inputs = document.querySelectorAll('.cke_dialog_ui_button');
                    inputs.forEach(function(input) {
                        input.style.margin = '116px 0 0 0';
                    });
                    var inputs = document.querySelectorAll('.cke_dialog_footer');
                    inputs.forEach(function(input) {
                        input.style.borderTop = 'none';
                    });
                };
            }
        }
    }
});

var editor = CKEDITOR.replace('Solution17', {
    extraPlugins: 'uploadimage',
    filebrowserImageUploadUrl: "{{ route('ckeditor.upload') }}?_token={{ csrf_token() }}", // Địa chỉ upload ảnh
    filebrowserUploadMethod: 'form',
    height: 300,
});

CKEDITOR.config.removeDialogTabs = '';  // Đảm bảo không ẩn tab Upload

editor.on('instanceReady', function() {
    console.log('Editor is ready!');
});

// Sự kiện 'dialogDefinition' để can thiệp vào các dialog (chỉ can thiệp vào tab Upload trong dialog image)
CKEDITOR.on('dialogDefinition', function(ev) {
    var dialogName = ev.data.name;
    var dialogDefinition = ev.data.definition;

    if (dialogName === 'image') {
        var uploadTab = dialogDefinition.getContents('Upload');
        if (uploadTab && uploadTab.elements) {
            var uploadButton = uploadTab.get('uploadButton');

            // Kiểm tra và thao tác với nút upload
            if (uploadButton && uploadButton.onClick) {
                var originalOnClick = uploadButton.onClick;
                uploadButton.onClick = function(evt) {
                    console.log("vào đây chưa");
                    var inputs = document.querySelectorAll('.cke_dialog_ui_input_file');
                    inputs.forEach(function(input) {
                        input.style.height = '200px';
                    });
                    var inputs = document.querySelectorAll('.cke_dialog_ui_button');
                    inputs.forEach(function(input) {
                        input.style.margin = '116px 0 0 0';
                    });
                    var inputs = document.querySelectorAll('.cke_dialog_footer');
                    inputs.forEach(function(input) {
                        input.style.borderTop = 'none';
                    });
                };
            }
        }
    }
});

var editor = CKEDITOR.replace('Solution18', {
    extraPlugins: 'uploadimage',
    filebrowserImageUploadUrl: "{{ route('ckeditor.upload') }}?_token={{ csrf_token() }}", // Địa chỉ upload ảnh
    filebrowserUploadMethod: 'form',
    height: 300,
});

CKEDITOR.config.removeDialogTabs = '';  // Đảm bảo không ẩn tab Upload

editor.on('instanceReady', function() {
    console.log('Editor is ready!');
});

// Sự kiện 'dialogDefinition' để can thiệp vào các dialog (chỉ can thiệp vào tab Upload trong dialog image)
CKEDITOR.on('dialogDefinition', function(ev) {
    var dialogName = ev.data.name;
    var dialogDefinition = ev.data.definition;

    if (dialogName === 'image') {
        var uploadTab = dialogDefinition.getContents('Upload');
        if (uploadTab && uploadTab.elements) {
            var uploadButton = uploadTab.get('uploadButton');

            // Kiểm tra và thao tác với nút upload
            if (uploadButton && uploadButton.onClick) {
                var originalOnClick = uploadButton.onClick;
                uploadButton.onClick = function(evt) {
                    console.log("vào đây chưa");
                    var inputs = document.querySelectorAll('.cke_dialog_ui_input_file');
                    inputs.forEach(function(input) {
                        input.style.height = '200px';
                    });
                    var inputs = document.querySelectorAll('.cke_dialog_ui_button');
                    inputs.forEach(function(input) {
                        input.style.margin = '116px 0 0 0';
                    });
                    var inputs = document.querySelectorAll('.cke_dialog_footer');
                    inputs.forEach(function(input) {
                        input.style.borderTop = 'none';
                    });
                };
            }
        }
    }
});

var editor = CKEDITOR.replace('Solution19', {
    extraPlugins: 'uploadimage',
    filebrowserImageUploadUrl: "{{ route('ckeditor.upload') }}?_token={{ csrf_token() }}", // Địa chỉ upload ảnh
    filebrowserUploadMethod: 'form',
    height: 300,
});

CKEDITOR.config.removeDialogTabs = '';  // Đảm bảo không ẩn tab Upload

editor.on('instanceReady', function() {
    console.log('Editor is ready!');
});

// Sự kiện 'dialogDefinition' để can thiệp vào các dialog (chỉ can thiệp vào tab Upload trong dialog image)
CKEDITOR.on('dialogDefinition', function(ev) {
    var dialogName = ev.data.name;
    var dialogDefinition = ev.data.definition;

    if (dialogName === 'image') {
        var uploadTab = dialogDefinition.getContents('Upload');
        if (uploadTab && uploadTab.elements) {
            var uploadButton = uploadTab.get('uploadButton');

            // Kiểm tra và thao tác với nút upload
            if (uploadButton && uploadButton.onClick) {
                var originalOnClick = uploadButton.onClick;
                uploadButton.onClick = function(evt) {
                    console.log("vào đây chưa");
                    var inputs = document.querySelectorAll('.cke_dialog_ui_input_file');
                    inputs.forEach(function(input) {
                        input.style.height = '200px';
                    });
                    var inputs = document.querySelectorAll('.cke_dialog_ui_button');
                    inputs.forEach(function(input) {
                        input.style.margin = '116px 0 0 0';
                    });
                    var inputs = document.querySelectorAll('.cke_dialog_footer');
                    inputs.forEach(function(input) {
                        input.style.borderTop = 'none';
                    });
                };
            }
        }
    }
});

var editor = CKEDITOR.replace('Solution20', {
    extraPlugins: 'uploadimage',
    filebrowserImageUploadUrl: "{{ route('ckeditor.upload') }}?_token={{ csrf_token() }}", // Địa chỉ upload ảnh
    filebrowserUploadMethod: 'form',
    height: 300,
});

CKEDITOR.config.removeDialogTabs = '';  // Đảm bảo không ẩn tab Upload

editor.on('instanceReady', function() {
    console.log('Editor is ready!');
});

// Sự kiện 'dialogDefinition' để can thiệp vào các dialog (chỉ can thiệp vào tab Upload trong dialog image)
CKEDITOR.on('dialogDefinition', function(ev) {
    var dialogName = ev.data.name;
    var dialogDefinition = ev.data.definition;

    if (dialogName === 'image') {
        var uploadTab = dialogDefinition.getContents('Upload');
        if (uploadTab && uploadTab.elements) {
            var uploadButton = uploadTab.get('uploadButton');

            // Kiểm tra và thao tác với nút upload
            if (uploadButton && uploadButton.onClick) {
                var originalOnClick = uploadButton.onClick;
                uploadButton.onClick = function(evt) {
                    console.log("vào đây chưa");
                    var inputs = document.querySelectorAll('.cke_dialog_ui_input_file');
                    inputs.forEach(function(input) {
                        input.style.height = '200px';
                    });
                    var inputs = document.querySelectorAll('.cke_dialog_ui_button');
                    inputs.forEach(function(input) {
                        input.style.margin = '116px 0 0 0';
                    });
                    var inputs = document.querySelectorAll('.cke_dialog_footer');
                    inputs.forEach(function(input) {
                        input.style.borderTop = 'none';
                    });
                };
            }
        }
    }
});
    </script>
</div>
