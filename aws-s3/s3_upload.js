$(document).ready(function () {
    $("#uploadForm").submit(function () {
        $("#progress").show();
        var bucket = new AWS.S3();
        var uploadFiles = $('#upFile')[0];
        var upFile = uploadFiles.files[0];
        if (upFile) {
            var uploadParams = {Key: 'podcats/' + (Date.now()) + '/' + upFile.name, ContentType: upFile.type, ACL: 'public-read', Bucket: 'inovcares'};
            bucket.createMultipartUpload(uploadParams, function (err, data) {
                console.log(data);
                var params = {
                    Body: upFile,
                    Bucket: "inovcares",
                    Key: 'podcats/' + (Date.now()) + '/' + upFile.name,
                    PartNumber: 1,
                    UploadId: data.UploadId
                };
                bucket.uploadPart(params, function (err, data) {
                    if (err)
                        console.log(err, err.stack); // an error occurred
                    else
                        console.log('location--- '+data.Location);           // successful response
                });
//                var params = {
//                    Bucket: "inovcares",
//                    Key: 'podcats/' + (Date.now()) + '/' + upFile.name,
//                    MultipartUpload:
//                            {Parts:
//                                        [{ETag: "\"ETagValue1\"", PartNumber: 1},
//                                            {ETag: "\"ETagValue2\"", PartNumber: 2}]
//                            },
//                    UploadId: data.UploadId
//                };
//                bucket.completeMultipartUpload(params, function (err, data) {
//                    if (err) {
//                        console.log(err, err.stack); // an error occurred
//                    } else {
//                        console.log(data);
//                    }// successful response
//                });
            });
//            bucket.upload(uploadParams).on('httpUploadProgress', function (evt) {
//                //console.log("File Uploading: " + parseInt((evt.loaded * 100) / evt.total)+'%');
//            }).send(function (err, data) {
//                console.log(data);
//                $('#upFile').val(null);
//                $("#showMessage").show();
//                $("#progress").hide();
//            });
        }
        return false;

    });
});