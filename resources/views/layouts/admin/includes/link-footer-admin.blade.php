<script src="{{asset('ckeditor5/build/jQuery.js')}}"></script>
<script src="{{asset('dashboard/assets/js/Chart.min.js')}}"></script>
{{--<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>--}}

<!-- BEGIN: Vendor JS-->
<script src="{{asset('dashboard/assets/vendors/js/vendors.min.js')}}"></script>
<script src="{{asset('dashboard/assets/fonts/LivIconsEvo/js/LivIconsEvo.tools.min.js')}}"></script>
<script src="{{asset('dashboard/assets/fonts/LivIconsEvo/js/LivIconsEvo.defaults.js')}}"></script>
<script src="{{asset('dashboard/assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js')}}"></script>
<script src="{{asset('dashboard/assets/vendors/js/charts/apexcharts.min.js')}}"></script>
<script src="{{asset('dashboard/assets/vendors/js/extensions/swiper.min.js')}}"></script>
<script src="{{asset('dashboard/assets/js/scripts/configs/horizontal-menu-light.js')}}"></script>
<script src="{{asset('dashboard/assets/js/scripts/configs/vertical-menu-light.js')}}"></script>
<script src="{{asset('dashboard/assets/js/core/app-menu.js')}}"></script>
<script src="{{asset('dashboard/assets/js/core/app.js')}}"></script>
<script src="{{asset('dashboard/assets/js/scripts/components.js')}}"></script>
<script src="{{asset('dashboard/assets/js/scripts/footer.js')}}"></script>
<script src="{{asset('dashboard/assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
<script src="{{asset('dashboard/assets/js/scripts/forms/select/form-select2.js')}}"></script>
<script src="{{asset('dashboard/assets/js/scripts/customizer.js')}}"></script>
<script src="{{asset('dashboard/assets/js/scripts/pages/dashboard-ecommerce.js')}}"></script>

@livewireScripts
@include('sweetalert::alert')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<x-livewire-alert::scripts/>
@stack('scripts')



<script src="{{asset('ckeditor5/build/jQuery.js')}}"></script>
<script src="{{asset('ckeditor5/build/ckeditor.js')}}"></script>

<script>

    //Define an adapter to upload the files
    class MyUploadAdapter {
        constructor(loader) {
            // The file loader instance to use during the upload. It sounds scary but do not
            // worry — the loader will be passed into the adapter later on in this guide.
            this.loader = loader;

            // URL where to send files.
            this.url = '{{ route('ckeditor.upload') }}';

            //
        }
        // Starts the upload process.
        upload() {
            return this.loader.file.then(
                (file) =>
                    new Promise((resolve, reject) => {
                        this._initRequest();
                        this._initListeners(resolve, reject, file);
                        this._sendRequest(file);
                    })
            );
        }
        // Aborts the upload process.
        abort() {
            if (this.xhr) {
                this.xhr.abort();
            }
        }
        // Initializes the XMLHttpRequest object using the URL passed to the constructor.
        _initRequest() {
            const xhr = (this.xhr = new XMLHttpRequest());
            // Note that your request may look different. It is up to you and your editor
            // integration to choose the right communication channel. This example uses
            // a POST request with JSON as a data structure but your configuration
            // could be different.
            // xhr.open('POST', this.url, true);
            xhr.open("POST", this.url, true);
            xhr.setRequestHeader("x-csrf-token", "{{ csrf_token() }}");
            xhr.responseType = "json";
        }
        // Initializes XMLHttpRequest listeners.
        _initListeners(resolve, reject, file) {
            const xhr = this.xhr;
            const loader = this.loader;
            const genericErrorText = `Couldn't upload file: ${file.name}.`;
            xhr.addEventListener("error", () => reject(genericErrorText));
            xhr.addEventListener("abort", () => reject());
            xhr.addEventListener("load", () => {
                const response = xhr.response;
                // This example assumes the XHR server's "response" object will come with
                // an "error" which has its own "message" that can be passed to reject()
                // in the upload promise.
                //
                // Your integration may handle upload errors in a different way so make sure
                // it is done properly. The reject() function must be called when the upload fails.
                if (!response || response.error) {
                    return reject(response && response.error ? response.error.message : genericErrorText);
                }
                // If the upload is successful, resolve the upload promise with an object containing
                // at least the "default" URL, pointing to the image on the server.
                // This URL will be used to display the image in the content. Learn more in the
                // UploadAdapter#upload documentation.
                resolve({
                    default: response.url,
                });
            });
            // Upload progress when it is supported. The file loader has the #uploadTotal and #uploaded
            // properties which are used e.g. to display the upload progress bar in the editor
            // user interface.
            if (xhr.upload) {
                xhr.upload.addEventListener("progress", (evt) => {
                    if (evt.lengthComputable) {
                        loader.uploadTotal = evt.total;
                        loader.uploaded = evt.loaded;
                    }
                });
            }
        }
        // Prepares the data and sends the request.
        _sendRequest(file) {
            // Prepare the form data.
            const data = new FormData();
            data.append("upload", file);
            // Important note: This is the right place to implement security mechanisms
            // like authentication and CSRF protection. For instance, you can use
            // XMLHttpRequest.setRequestHeader() to set the request headers containing
            // the CSRF token generated earlier by your application.
            // Send the request.
            this.xhr.send(data);
        }
        // ...
    }

    function SimpleUploadAdapterPlugin(editor) {
        editor.plugins.get("FileRepository").createUploadAdapter = (loader) => {
            // Configure the URL to the upload script in your back-end here!
            return new MyUploadAdapter(loader);
        };
    }



    ClassicEditor
        .create( document.querySelector( '.editor' ), {
            toolbar: {
                shouldNotGroupWhenFull: true
            },
            licenseKey: '',
            extraPlugins: [SimpleUploadAdapterPlugin],
            heading: {
                options: [
                    { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                    { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                    { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                    { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                    { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                    { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                    { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
                ]
            },
            language: 'fa'
        } )
        .then( editor => {
            window.editor = editor;
        } )
        .catch( error => {
            console.error( 'Oops, something went wrong!' );
            console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
            console.warn( 'Build id: 8sj0k3eaq1q3-rok9zu1zgxp3' );
            console.error( error );
        } );


</script>
