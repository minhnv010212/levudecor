var barpdf = document.getElementById('barpdf')
  var percentpdf = document.getElementById('percentpdf')
  var resultpdf = document.getElementById('resultpdf')
  var percenticonValue = "0%";
  
  var fileInputpdf = document.getElementById('select-filepdf');  
  var form = document.getElementById('form-uploadpdf');
 
  form.addEventListener('submit', function(evt) {
    // Chan khong cho form tao submit
    evt.preventDefault();
    
    // Ajax upload
    var filepdf = fileInputpdf.files[0];
    
    // fd dung de luu gia tri goi len
    var fdpdf = new FormData();
    fdpdf.append('filepdf', filepdf);
    
    // xhr dung de goi data bang ajax
    var xhrpdf = new XMLHttpRequest();
    xhrpdf.open('POST', 'plugin/order.php', true);
    
    xhrpdf.upload.onprogress = function(e) {
      if (e.lengthComputable) {
        var percentpdfValue = (e.loaded / e.total) * 100 + '%';
        percentpdf.innerHTML  = percentpdfValue;
        barpdf.setAttribute('style', 'width: ' + percentpdfValue);
      }
    };
    
    xhrpdf.onload = function() {
      if (this.status == 200) {
        resultpdf.innerHTML = this.response;        
      };
    };
    
    xhrpdf.send(fdpdf);
    
    
  }, false);
 
  