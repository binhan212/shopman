<!DOCTYPE html>
<html lang="en" ng-app="myapp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/assets_info/css/base.css">
    <link rel="stylesheet" href="/assets_info/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel = "stylesheet" 
         href = "https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
         integrity = "sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" 
         crossorigin = "anonymous">
    
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.3.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jsonform/2.2.5/jsonform.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/exceljs/4.3.0/exceljs.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cell/1.2.0/cell.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> 

    
</head>
<style>
    input{
        width: 100%;
        height:30px;
    }
    .get-in-touch {
    max-width: 800px;
    margin: 50px auto;
    position: relative;

    }
    .get-in-touch .title {
    text-align: center;
    text-transform: uppercase;
    letter-spacing: 3px;
    font-size: 3.2em;
    line-height: 48px;
    padding-bottom: 48px;
        color: #5543ca;
        background: #5543ca;
        background: -moz-linear-gradient(left,#f4524d  0%,#5543ca 100%) !important;
        background: -webkit-linear-gradient(left,#f4524d  0%,#5543ca 100%) !important;
        background: linear-gradient(to right,#f4524d  0%,#5543ca  100%) !important;
        -webkit-background-clip: text !important;
        -webkit-text-fill-color: transparent !important;
    }

    .contact-form .form-field {
    position: relative;
    margin: 32px 0;
    padding: 5px 0px;
    }
    .contact-form .input-text {
    display: block;
    width: 100%;
    height: 36px;
    border-width: 0 0 2px 0;
    border-color: #5543ca;
    font-size: 18px;
    line-height: 26px;
    font-weight: 400;
    }
    .contact-form .input-text:focus {
    outline: none;
    }
    .contact-form .input-text:focus + .label,
    .contact-form .input-text.not-empty + .label {
    -webkit-transform: translateY(-24px);
            transform: translateY(-24px);
    }
    .contact-form .label {
    left: 20px;
    bottom: 11px;
    font-size: 18px;
    line-height: 26px;
    font-weight: 400;
    color: #5543ca;
    cursor: text;
    transition: -webkit-transform .2s ease-in-out;
    transition: transform .2s ease-in-out;
    transition: transform .2s ease-in-out, 
    -webkit-transform .2s ease-in-out;
    }
    .contact-form .submit-btn {
    display: inline-block;
    background-color: #000;
    background-image: linear-gradient(125deg,#a72879,#064497);
    color: #fff;
    text-transform: uppercase;
    letter-spacing: 2px;
    font-size: 16px;
    padding: 8px 16px;
    border: none;
    width:200px;
    cursor: pointer;
    height:37px;
    }
    .table thead th {
        font-size: 16px;
    }
    .table tbody td {
        font-size: 14px;
    }

    .icon_detail{
        color:#1ba926;
    }
    .icon_detail:hover{
        color:#80d587;
        cursor: pointer;
    }
    .dh_ct{
        width: 100%;
        padding:10px 20px;
    }
</style>
<body ng-controller="indoccontroller">
    <!-- Block Element Modifier -->
    <button onclick="exportHTML()" class="btn btn-info">In file doc</button>
    <button  id="exportpdf" value="Download PDF" class="btn btn-info">In file pdf</button>
    <button  id="excel" class="btn btn-info">In file excel</button>

    <div class="app" id="source-html">
        <div id="table">
            <table class="table table-hover" id="yourTableIdName">
                <thead>
                    <tr>
                        <th>MaDH</th>
                        <th>NgayDatHang</th>
                        <th>ThanhTien</th>
                        <th>MaCTDH</th>
                        <th>MaSize</th>
                        <th>SoLuong</th>
                        <th>Gia</th>
                        <th>TenSP</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="c in ct.ctdhs">
                        <td>@{{ct.MaDH}}</td>
                        <td>@{{ct.NgayDatHang}}</td>
                        <td>@{{ct.ThanhTien}}</td>
                        <td>@{{c.MaCTDH}}</td>
                        <td>@{{c.MaSize}}</td>
                        <td>@{{c.SoLuong}}</td>
                        <td>@{{c.Gia}}</td>
                        <td>@{{c.TenSP}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <script src = "https://code.jquery.com/jquery-3.3.1.slim.min.js" 
         integrity = "sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 
         crossorigin = "anonymous">
      </script>
      
      <script src = "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" 
         integrity = "sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" 
         crossorigin = "anonymous">
      </script>
      
      <script src = "https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" 
         integrity = "sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" 
         crossorigin = "anonymous">
      </script>

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="/js/angular.min.js"></script>
    <script src="/js/appTC.js"></script>
    <script src="/js/indoc.js"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
</body>
<!-- doc -->
<script type="text/javascript">
    function exportHTML(){
       var header = "<html xmlns:o='urn:schemas-microsoft-com:office:office' "+
            "xmlns:w='urn:schemas-microsoft-com:office:word' "+
            "xmlns='http://www.w3.org/TR/REC-html40'>"+
            "<head><meta charset='utf-8'><title>Export HTML to Word Document with JavaScript</title></head><body>";
       var footer = "</body></html>";
       //tạo 1 đoạn mã html
       var sourceHTML = header+document.getElementById("source-html").innerHTML+footer;
       // yêu cầu trình duyệt t xử lý nội dung đoạn code theo loại ứng dụng word và mã hóa nó
       var source = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(sourceHTML);
       var fileDownload = document.createElement("a");
       document.body.appendChild(fileDownload);
       fileDownload.href = source;
       fileDownload.download = 'document.doc';
       fileDownload.click();
       document.body.removeChild(fileDownload);
    }
</script>
<!-- pdf -->
<script>
        $(document).ready(function() {
 
            $("#exportpdf").click(function() {
                var pdf = new jsPDF('p', 'pt', 'ledger');
                // source can be HTML-formatted string, or a reference
                // to an actual DOM element from which the text will be scraped.
                //nguồn có thể là chuỗi định dạng HTML hoặc một tham chiếu
                // đến một phần tử DOM thực tế mà từ đó văn bản sẽ được loại bỏ.
                source = $('#yourTableIdName')[0];
 
                // we support special element handlers. Register them with jQuery-style 
                // ID selector for either ID or node name. ("#iAmID", "div", "span" etc.)
                // There is no support for any other type of selectors 
                // (class, of compound) at this time.

                // chúng tôi hỗ trợ các trình xử lý phần tử đặc biệt. Đăng ký chúng bằng jQuery-style
                // Bộ chọn ID cho ID hoặc tên nút. ("#iAmID", "div", "span", v.v.)
                // Không hỗ trợ bất kỳ loại bộ chọn nào khác
                // (class, of compound) tại thời điểm này.

                //xử lý phần tử đặc biệt
                specialElementHandlers = {
                    // element with id of "bypass" - jQuery style selector
                    '#bypassme' : function(element, renderer) {
                        // true = "handled elsewhere, bypass text extraction"
                        //true = "được xử lý ở nơi khác, bỏ qua trích xuất văn bản"
                        return true
                    }
                };
                margins = {
                    top : 80,
                    bottom : 60,
                    left : 60,
                    width : 522
                };
                // all coords and widths are in jsPDF instance's declared units
                // 'inches' in this case
                // tất cả coords và width đều nằm trong các đơn vị được khai báo của cá thể jsPDF
                // 'inch' trong trường hợp này

                pdf.fromHTML(source, // HTML string or DOM elem ref.
                margins.left, // x coord
                margins.top, { // y coord
                    'width' : margins.width, // max width of content on PDF
                    'elementHandlers' : specialElementHandlers
                },
 
                function(dispose) {
                    // dispose: object with X, Y of the last line add to the PDF 
                    //          this allow the insertion of new lines after html
                    //đối tượng có X, Y của dòng cuối cùng thêm vào PDF
                    // điều này cho phép chèn các dòng mới sau html
                    pdf.save('binhan.pdf');
                }, margins);
            });
 
        });
</script>

<!-- excel -->
<script src="/js/jquery.table2excel.min.js"></script>

<script>
 $("#excel").click(function(){
 $("#yourTableIdName").table2excel({
 name: "Worksheet Name",
 filename: "FileExcel",
 fileext: ".xls"
 }) 
 });
 </script>

</html>