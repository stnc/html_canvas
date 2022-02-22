<h1>BY SELMAN Overlay text on canvas image and save as base64</h1>
<div class="page-wrap">
  <div class="controls">
    <input class="controls__input" type="file" id="imageLoader" name="imageLoader"/>
    <label class="controls__label" for="name">First, choose an image.</label>
    
    <input class="controls__input" id="name" type="text" value=""/>
    <label class="controls__label" for="name">Overlay Text</label>
  </div>
  <div id="canvas-wrap">
     <canvas style="display:block" id="imageCanvas" width=525px height=520px>
        <canvas id="canvasID"></canvas>
    </canvas> 
    <image id="theimage"></image>

  </div>
  <button id="download">ındır</button>
</div>
<script src="canvas2image.js"></script>


https://permadi.com/2010/10/html5-saving-canvas-image-data-using-php-and-ajax/

<script>
    var text_title ="Sleman Tunç";
var imageLoader = document.getElementById('imageLoader');
    imageLoader.addEventListener('change', handleImage, false);
var canvas = document.getElementById('imageCanvas');
var ctx = canvas.getContext('2d');
var img = new Image();
img.crossOrigin="anonymous";

window.addEventListener('load', DrawPlaceholder)

function DrawPlaceholder() {
    img.onload = function() {
        DrawOverlay(img);
        DrawText();
        DynamicText(img)
    };
    img.src = 'http://aktar.test/dogum.png';
  
}
function DrawOverlay(img) {
    ctx.drawImage(img,0,0);
    // ctx.fillStyle = 'rgba(30, 144, 255, 0.4)';
    ctx.fillStyle = 'rgba(30, 144, 255, 0.0)';
    ctx.fillRect(0, 0, canvas.width, canvas.height);
}
function DrawText() {
    ctx.fillStyle = "#fff";
    ctx.textBaseline = 'middle';
    ctx.font = "30px 'Montserrat'";
    ctx.fillText(text_title, 270, 247);
}
function DynamicText(img) {
  document.getElementById('name').addEventListener('keyup', function() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    DrawOverlay(img);
    DrawText(); 
    text_title = this.value;
    ctx.fillText(text_title, 270, 247);
  });
}
function handleImage(e) {
    var reader = new FileReader();
    var img = "";
    var src = "";
    reader.onload = function(event) {
        img = new Image();
        img.onload = function() {
            canvas.width = img.width;
            canvas.height = img.height;
            ctx.drawImage(img,0,0);
        }
        img.src = event.target.result;
        src = event.target.result;
      //  canvas.classList.add("show");
        DrawOverlay(img);
        DrawText(); 
        DynamicText(img);   
    }

    reader.readAsDataURL(e.target.files[0]); 
 
}
function convertToImage() {
	//window.open(canvas.toDataURL('png'));
    console.log(canvas.toDataURL('image/jpeg', 100));
}


document.getElementById('download').onclick = function download() {
		// convertToImage();
        var canvas = document.getElementById("imageCanvas");
                document.getElementById("theimage").src = canvas.toDataURL();
           
                Canvas2Image.convertToJPEG(canvasObj, 500, 500)


}

// console.log(canvas.toDataURL('image/jpeg', 100));


</script>


