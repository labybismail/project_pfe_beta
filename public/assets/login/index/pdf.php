

<?php

require_once __DIR__ . '/pdf/autoload.php';

$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [290, 236]]);

$mpdf->autoScriptToLang = true;
$mpdf->autoLangToFont = true;

$mpdf->AddPage("P");

$stylesheet = file_get_contents('style.css');
$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);


    $html = '
    
  

        <body>
    <div class="col-md-7 col-lg-8 col-xl-9" id="content"  >
    <form  method="POST" action="" >
    <div class="card">
        <div class="card-header">
            <h4 class="card-title mb-0">Add Prescription</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="biller-info">
                        <h4 class="d-block"  >Dr. Darren Elder</h4>
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
                    <div class="prescription-info">
                        <div class="row form-row prescription-cont">
                            <div class="col-12 col-md-10 col-lg-11">
                                <div class="row form-row">
                                    <div class="col-12 col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control">
                                        </div> 
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <input type="text" class="form-control">
                                        </div> 
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>Days</label>
                                            <input type="text" class="form-control">
                                        </div> 
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>Time</label>
                                            <input type="text" class="form-control">
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="add-more">
                        <a href="javascript:void(0);" class="add-prescription"><i class="fa fa-plus-circle"></i> Add More</a>
                    </div>
                </div>
            </div>
    <!-- /Education -->
            
            <!-- Signature -->
            <div class="row">
                <div class="col-md-12 text-right">
                    <div class="signature-wrap">
                        <div class="signature">
                            Click here to sign
                        </div>
                        <div class="sign-name">
                            <p class="mb-0">( Dr. Darren Elder )</p>
                            <span class="text-muted">Signature</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Signature -->
            
            <!-- Submit Section -->
            <div class="row">
                <div class="col-md-12">
                    <div class="submit-section">
                        <button id="cmd"  type="submit" class="btn btn-primary submit-btn">Save</button>
                        <button type="reset" class="btn btn-secondary submit-btn">Clear</button>
                    </div>
                </div>
            </div>
            <!-- /Submit Section -->
            
        </div>
    </div>
</form>
</div  id="editor" >
</div>

';


$mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);

$mpdf->Output("myPDF.pdf","I");?>
<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery.min.js"></script>

<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>


<script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
<script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>


<script src="assets/plugins/select2/js/select2.min.js"></script>


<script src="assets/plugins/dropzone/dropzone.min.js"></script>


<script src="assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js"></script>


<script src="assets/js/profile-settings.js"></script>


<script src="assets/js/script.js"></script>


