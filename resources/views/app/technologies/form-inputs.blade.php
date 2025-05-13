@php $editing = isset($technology) @endphp

<div class="row">
    <!-- <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="Background"
            label="Background"
            :value="old('Background', ($editing ? $technology->Background : ''))"
            maxlength="255"
            placeholder="Background"
            required
        ></x-inputs.text>
    </x-inputs.group> -->

    <div
        x-data="imageViewer('{{ $editing && $technology->Background ? \Storage::url($technology->Background) : '' }}')"
    >
        <x-inputs.partials.label
            name="Background"
            label="Background"
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
                name="Background"
                id="Background"
                @change="fileChosen"
            />
        </div>

        @error('Background') @include('components.inputs.partials.error')
        @enderror
    </div>

    <!-- <div class="col-sm-12">
        <div class="mb-3">
            <label for="formFile" class="form-label">Default file input example</label>
            <input class="form-control" name="Background" label="Background" 
            type="file" id="formFile" placeholder="Background">
        </div>
    </div> -->

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="Slogan"
            label="Slogan"
            :value="old('Slogan', ($editing ? $technology->Slogan : ''))"
            maxlength="255"
            placeholder="Slogan"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="SubTitle"
            label="Sub Title"
            :value="old('SubTitle', ($editing ? $technology->SubTitle : ''))"
            maxlength="255"
            placeholder="Sub Title"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="Description"
            label="Description"
            maxlength="255"
            required
            >{{ old('Description', ($editing ? $technology->Description : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="Technology1"
            id="Technology1"
            label="Technology 1"
            maxlength="255"
            rows
            >{{ old('Technology1', ($editing ? $technology->Technology1 : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="Technology2"
            id="Technology2"
            label="Technology 2"
            maxlength="255"
            >{{ old('Technology2', ($editing ? $technology->Technology2 : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="Technology3"
            id="Technology3"
            label="Technology 3"
            maxlength="255"
            >{{ old('Technology3', ($editing ? $technology->Technology3 : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="Technology4"
            id="Technology4"
            label="Technology 4"
            maxlength="255"
            >{{ old('Technology4', ($editing ? $technology->Technology4 : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="Technology5"
            id="Technology5"
            label="Technology 5"
            maxlength="255"
            >{{ old('Technology5', ($editing ? $technology->Technology5 : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="Technology6"
            id="Technology6"
            label="Technology 6"
            maxlength="255"
            >{{ old('Technology6', ($editing ? $technology->Technology6 : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="Technology7"
            id="Technology7"
            label="Technology 7"
            maxlength="255"
            >{{ old('Technology7', ($editing ? $technology->Technology7 : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="Technology8"
            id="Technology8"
            label="Technology 8"
            maxlength="255"
            >{{ old('Technology8', ($editing ? $technology->Technology8 : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="Technology9"
            id="Technology9"
            label="Technology 9"
            maxlength="255"
            >{{ old('Technology9', ($editing ? $technology->Technology9 : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="Technology10"
            id="Technology10"
            label="Technology 10"
            maxlength="255"
            >{{ old('Technology10', ($editing ? $technology->Technology10 : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="Technology11"
            id="Technology11"
            label="Technology 11"
            maxlength="255"
            >{{ old('Technology11', ($editing ? $technology->Technology11 : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="Technology12"
            id="Technology12"
            label="Technology 12"
            maxlength="255"
            >{{ old('Technology12', ($editing ? $technology->Technology12 : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="Technology13"
            id="Technology13"
            label="Technology 13"
            maxlength="255"
            >{{ old('Technology13', ($editing ? $technology->Technology13 : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="Technology14"
            id="Technology14"
            label="Technology 14"
            maxlength="255"
            >{{ old('Technology14', ($editing ? $technology->Technology14 : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="Technology15"
            id="Technology15"
            label="Technology 15"
            maxlength="255"
            >{{ old('Technology15', ($editing ? $technology->Technology15: ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="Technology16"
            id="Technology16"
            label="Technology 16"
            maxlength="255"
            >{{ old('Technology16', ($editing ? $technology->Technology16 : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="Technology17"
            id="Technology17"
            label="Technology 17"
            maxlength="255"
            >{{ old('Technology17', ($editing ? $technology->Technology17 : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="Technology18"
            id="Technology18"
            label="Technology 18"
            maxlength="255"
            >{{ old('Technology18', ($editing ? $technology->Technology18 : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="Technology19"
            id="Technology19"
            label="Technology 19"
            maxlength="255"
            >{{ old('Technology19', ($editing ? $technology->Technology19 : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="Technology20"
            id="Technology20"
            label="Technology 20"
            maxlength="255"
            >{{ old('Technology20', ($editing ? $technology->Technology20 : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>
    

    <!-- <script src="{{asset('template/ckeditor/ckeditor.js')}}"></script> -->
    <script src="https://cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script>
    <script>
        // CKEDITOR.replace('Technology1');

    var editor = CKEDITOR.replace('Technology1', {
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

        CKEDITOR.replace('Technology2', {
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
        CKEDITOR.replace('Technology3', {
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
        CKEDITOR.replace('Technology4', {
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
        CKEDITOR.replace('Technology5', {
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
        CKEDITOR.replace('Technology6', {
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
        CKEDITOR.replace('Technology7', {
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
        CKEDITOR.replace('Technology8', {
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
        CKEDITOR.replace('Technology9', {
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
        CKEDITOR.replace('Technology10', {
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
        CKEDITOR.replace('Technology11', {
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
        CKEDITOR.replace('Technology12', {
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
        CKEDITOR.replace('Technology13', {
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
        CKEDITOR.replace('Technology14', {
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
        CKEDITOR.replace('Technology15', {
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
        CKEDITOR.replace('Technology16', {
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
        CKEDITOR.replace('Technology17', {
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
        CKEDITOR.replace('Technology18', {
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
        CKEDITOR.replace('Technology19', {
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
        CKEDITOR.replace('Technology20', {
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
