<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Doccure</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link href="assets/img/favicon.png" rel="icon">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css">
    <link rel="stylesheet" href="assets/plugins/dropzone/dropzone.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <form id="server">
        <div class="col-md-7 col-lg-8 col-xl-9" id="content">

            <div class="card" id="invoice">
                <div class="card-header">
                    <h4 class="card-title mb-0">Add Prescription</h4>
                </div>
                <div class="card-body">

                    <div class="row headerr" id="headerr" style="max-width:934px;max-height:175px;">
                        <div class="col-sm-6">
                            <div class="biller-info">
                                <h4 class="d-block">Dr. Darren Elder</h4>
                                <span class="d-block text-sm text-muted">Dentist</span>
                                <span class="d-block text-sm text-muted">Newyork, United States</span>
                            </div>
                        </div>
                        <div class="col-sm-6 text-sm-right">
                            <div class="billing-info">
                                <h4 class="d-block">1 November 2019</h4>
                                <span class="d-block text-muted">#INV0001</span>
                            </div>
                        </div>
                    </div>


                    <!-- Education -->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add Prescription</h4>
                            <div class="prescription-info elementData"></div>
                            <div class="add-more">
                                <a href="javascript:void(0);" onclick="return addMoreRow(this)" class="add-prescription"><i class="fa fa-plus-circle"></i> Add More</a>
                            </div>
                        </div>
                    </div>
                    <!-- /Education -->

                    <!-- Signature -->
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <div class="signature-wrap">
                                <div class="signature" id="signature">
                                    <div class="sign-name">
                                        <p class="mb-0">( Dr. Darren Elder )</p>
                                        <span class="text-muted">Signature</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- /Signature -->

                    <!-- Submit Section -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="submit-section">
                                <button onclick="return saveForm(this)" type="button" class="btn btn-primary submit-btn save">Save</button>

                                <div class="upload-img">
                                    <div class="upload-img" style=" margin-top: 10px;">
                                        <div class="change-photo-btn">
                                            <span><i class="fa fa-upload"></i> Upload Signature</span>
                                            <input type="file" name="header" class="upload" id="imgInp">
                                        </div>
                                    </div>
                                    <span class="text-muted" style=" margin-bottom: 20px;   display: block;  text-align: center;"> 216px/81px</span>
                                </div>

                                <div class="upload-img">
                                    <div class="change-photo-btn">
                                        <span><i class="fa fa-upload"></i> Upload header</span>
                                        <input type="file" name="signature" class="upload" id="imgInpp">
                                    </div>
                                    <span class="text-muted" style=" margin-bottom: 20px;   display: block;  text-align: center;"> 934px/85px</span>

                                </div>

                            </div>
                        </div>


                    </div>
                    <!-- /Submit Section -->

                </div>
            </div>

        </div>
    </form>

    <script src="assets/js/jquery.min.js"></script>

    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <script>
        function newRow(id) {

            let btnDelete = `<div class="col-12 col-md-2 col-lg-1">
                                <label class="d-md-block d-sm-none d-none">&nbsp;</label>
                                    <a href="javascript:void(0)" onclick="return deleteRow(this)" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a>
                            </div>`
            var content = `
            <div class="row form-row prescription-cont">
                                    <div class="col-12 col-md-10 col-lg-11">
                                        <div class="row form-row">
                                            <div class="col-12 col-md-6 col-lg-3">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" autocomplete="off" class="form-control" name="name[` + id + `]" required="required">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-3">
                                                <div class="form-group">
                                                    <label>Quantity</label>
                                                    <input type="number" autocomplete="off" class="form-control" name="qty[` + id + `]" required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-3">
                                                <div class="form-group">
                                                    <label>Days</label>
                                                    <input type="number" autocomplete="off" class="form-control" name="days[` + id + `]" required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-3">
                                                <div class="form-group">
                                                    <div class="">
                                                        <label>Time</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label" id="te">
                                                            <input class="form-check-input" name="time[` + id + `][]" value="Morning" id="checkbox" value="Morning" type="checkbox" checked> Morning </input>
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label" id="te1">
                                                            <input class="form-check-input" name="time[` + id + `][]" value="Afternoon" id="checkbox1" value="Afternoon" type="checkbox"> Afternoon </input>
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label" id="te2">
                                                            <input class="form-check-input" name="time[` + id + `][]" value="Evening" id="checkbox2" value="Evening" type="checkbox"> Evening </input>
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label" id="te3">
                                                            <input class="form-check-input" name="time[` + id + `][]" value="Night" id="checkbox3" value="Night" type="checkbox"> Night </input>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    ` + ((id === 0) ? '' : btnDelete) + `
                                </div>
            `;
            return content
        }

        let baseElement = $('.elementData');
        let subElemengt = baseElement.find('.prescription-cont');
        baseElement.html(newRow(subElemengt.length));

        function deleteRow(elm) {
            $(elm).parents('.prescription-cont').remove();
        }

        function addMoreRow(elm) {
            baseElement = $('.elementData');
            subElemengt = baseElement.find('.prescription-cont');
            baseElement.append(newRow(subElemengt.length));
        }

        function saveForm(elm) {
            let form = $('#server');
            let formValue = form.serializeArray();

            var datapos = new FormData(); // Currently empty

            datapos.append('formData', JSON.stringify(formValue));

            if ($('input[name=header]')[0].files.length) {
                datapos.append('header', $('input[name=header]')[0].files[0]);
                datapos.append('header_default', "NO");
            }else{
                datapos.append('header_default', "YES");
            }

            if ($('input[name=signature]')[0].files.length) {
                datapos.append('signature', $('input[name=signature]')[0].files[0]);
                datapos.append('signature_default', "NO");
            }else{
                datapos.append('signature_default', "YES");
            }

            $.ajax({
                url: "generate.php",
                type: "POST",
                data: datapos,
                dataType: "JSON",
                contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
                processData: false, // NEEDED, DON'T OMIT THIS
                success: function(res) {
                    console.log("success");
                }
            });
        }

        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {

                $('#signature').replaceWith("<img class='signature' id='blah' src='#' alt='your image' />");
                blah.src = URL.createObjectURL(file)
            }
        }

        $(function() {
            var imagesPreview = function(input, placeToInsertImagePreview) {
                if (input.files) {
                    var filesAmount = input.files.length;
                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            $($.parseHTML('<img style="max-width:934px;max-height:175px;width:100%;height:100%">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                        }
                        reader.readAsDataURL(input.files[i]);
                    }
                }
            };

            $('#imgInpp').on('change', function() {
                $(".headerr").empty();
                imagesPreview(this, 'div.headerr');
            });
        });
    </script>



</body>


</html>