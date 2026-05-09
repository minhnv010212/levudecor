 
 
 document.querySelector("#btn_export_svg").onclick = function(){         
var svgData = $("#mysvg")[0].outerHTML;
var svgBlob = new Blob([svgData], {type:"image/svg+xml;charset=utf-8"});
var svgUrl = URL.createObjectURL(svgBlob);
var downloadLink = document.createElement("a");
downloadLink.href = svgUrl;
downloadLink.download = "tbigdecor.svg";
document.body.appendChild(downloadLink);
downloadLink.click();
document.body.removeChild(downloadLink);
 
        };
		
