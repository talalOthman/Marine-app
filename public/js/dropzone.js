Dropzone.autoDiscover = false;

   $(document).ready(function () {
        $("#upload-file").dropzone({
            maxFiles: 1,
            url: "/ajax_file_upload_handler/",
            success: function (file, response) {
                console.log(response);
            }
        });
   })

let browse = document.getElementById('browse-btn');

browse.addEventListener('click', function(e){
    e.preventDefault();    
})