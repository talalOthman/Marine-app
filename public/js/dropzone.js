
let browse = document.getElementById('browse-btn');

browse.addEventListener('click', function (e) {
    e.preventDefault();
})


Dropzone.options.dropzone =
{
    previewTemplate: `<div class="preview-container">
    <div class="progress">
    <div class="progress-bar progress-bar-primary" role="progressbar" data-dz-uploadprogress>
        <span class="progress-text"></span>
    </div>
</div>
    <i class="fas fa-file-download icon fa-9x"></i>
    <a href="/generate_report" class="generate-report-btn btn btn-primary button-item button">Generate Report</a>
    </div>`,
    maxFiles: 1000000000000000000,
    maxFilesize: 209715200,
    //~ renameFile: function(file) {
    //~ var dt = new Date();
    //~ var time = dt.getTime();
    //~ return time+"-"+file.name;    // to rename file name but i didn't use it. i renamed file with php in controller.
    //~ },
    acceptedFiles: ".csv,.xlsx",
    timeout: 0,
    init: function () {
        // Get images
        var myDropzone = this;
        $.ajax({
            url: gallery,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $.each(data, function (key, value) {

                    var file = { name: value.name, size: value.size };
                    myDropzone.options.addedfile.call(myDropzone, file);
                    myDropzone.options.thumbnail.call(myDropzone, file, value.path);
                    myDropzone.emit("complete", file);
                });
            }
        });
    },
    removedfile: function (file) {
        if (this.options.dictRemoveFile) {
            return Dropzone.confirm("Are You Sure to " + this.options.dictRemoveFile, function () {
                if (file.previewElement.id != "") {
                    var name = file.previewElement.id;
                } else {
                    var name = file.name;
                }
                //console.log(name);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: delete_url,
                    data: { filename: name },
                    success: function (data) {
                        alert(data.success + " File has been successfully removed!");
                    },
                    error: function (e) {
                        console.log(e);
                    }
                });
                var fileRef;
                return (fileRef = file.previewElement) != null ?
                    fileRef.parentNode.removeChild(file.previewElement) : void 0;
            });
        }
    },

    success: function (file, response) {
        file.previewElement.id = response.success;
        //console.log(file); 
        // set new images names in dropzone’s preview box.
        var olddatadzname = file.previewElement.querySelector("[data-dz-name]");
        file.previewElement.querySelector("img").alt = response.success;
        olddatadzname.innerHTML = response.success;
    },
    uploadprogress: function(file, progress, bytesSent) {
        if (file.previewElement) {
            var progressElement = file.previewElement.querySelector("[data-dz-uploadprogress]");
            progressElement.style.width = progress + "%";
            progressElement.querySelector(".progress-text").textContent = progress + "%";
        }
    },
    // error: function (file, response) {
    //     if ($.type(response) === "string")
    //         var message = response; //dropzone sends it's own error messages in string
    //     else
    //         var message = response.message;
    //     file.previewElement.classList.add("dz-error");
    //     _ref = file.previewElement.querySelectorAll("[data-dz-errormessage]");
    //     _results = [];
    //     for (_i = 0, _len = _ref.length; _i < _len; _i++) {
    //         node = _ref[_i];
    //         _results.push(node.textContent = message);
    //     }
    //     return _results;
    // }



};


