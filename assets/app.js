/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// start the Stimulus application
import './bootstrap';



import tinymce from 'tinymce';
import "tinymce/themes/silver/theme";
import "tinymce/icons/default/icons";
import "tinymce/plugins/image";
//import "tinymce/skins/ui/oxide/skin;
require("tinymce/skins/ui/oxide/skin.min.css");
//import "tinymce/skins/ui/oxide/skin.min.css";
//require("tinymce/skins/ui/oxide/skin.min.css");
//require("tinymce/skins/content/default/content.css");

let form = document.querySelector('#tinymce_editor');

tinymce.init({

    selector: '#article_body',
    // fix invalid form control with name is not focusable
    setup: function (editor) {
        editor.on('change', function () {
            tinymce.triggerSave();
        });
    },

    theme: "silver",
    skin: false,
    content_style: false,
    content_css: false,
    width: "100%",
    height: 300,
    plugins: 'image',
    toolbar: 'image',
    automatic_upload: true,
    /*
    URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
    images_upload_url: 'postAcceptor.php',
    here we add custom filepicker only to Image dialog
    */
    images_upload_url: '/attachment/' + form.dataset.articleId,
    file_picker_types: 'image',

    /* and here's our custom image picker*/
    file_picker_callback: function (cb, value, meta) {
        var input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('accept', 'image/*');

        /*
          Note: In modern browsers input[type="file"] is functional without
          even adding it to the DOM, but that might not be the case in some older
          or quirky browsers like IE, so you might want to add it to the DOM
          just in case, and visually hide it. And do not forget do remove it
          once you do not need it anymore.
        */

        input.onchange = function () {
            var file = this.files[0];

            var reader = new FileReader();
            reader.onload = function () {
                /*
                  Note: Now we need to register the blob in TinyMCEs image blob
                  registry. In the next release this part hopefully won't be
                  necessary, as we are looking to handle it internally.
                */
                var id = 'blobid' + (new Date()).getTime();
                var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                var base64 = reader.result.split(',')[1];
                var blobInfo = blobCache.create(id, file, base64);
                blobCache.add(blobInfo);

                /* call the callback and populate the Title field with the file name */
                cb(blobInfo.blobUri(), { title: file.name });
            };
            reader.readAsDataURL(file);
        };

        input.click();
    },

    // plugins: [
    //     "advlist autolink link image lists charmap print preview hr anchor pagebreak",
    //     "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
    //     "save table contextmenu directionality emoticons template paste textcolor"
    // ],

    //skin_url: "../node_modules/tinymce/skins/ui/oxide/skin.min.css",
    // content_css: false,
    // content_css_cors: false,
    //skin_url: false,

});
